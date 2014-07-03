<?php

namespace Home\Bundle\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Home\Bundle\HomeBundle\Entity\Tache;
use Home\Bundle\HomeBundle\Form\TacheType;

use Home\Bundle\HomeBundle\Entity\Project;
use Home\Bundle\HomeBundle\Form\ProjectType;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Tache controller.
 *
 * @Route("/tache")
 */
class TacheController extends Controller
{

    /**
     * Lists all Tache entities.
     *
     * @Route("/", name="tache")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HomeHomeBundle:Tache')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tache entity.
     *
     * @Route("/{id}", name="tache_create")
     * @Method("POST")
     * @Template("HomeHomeBundle:Tache:new.html.twig")
     */
    public function createAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity  = new Tache();
        $form = $this->createForm(new TacheType(), $entity);
        $project = $this->getDoctrine()->getRepository('HomeHomeBundle:Project')->find($id);
        $entity->setProjectid($project);

        $form->submit($request);

        if ($form->isValid()) {
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tache_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Tache entity.
     *
     * @Route("/{id}/new", name="tache_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $entity = new Tache();
        $em = $this->getDoctrine()->getManager();

        $userManager = $this->get('fos_user.user_manager');
        $Users = $userManager->findUsers();
        $UserArray = array();
        foreach ($Users as $user) {
            $UserArray[$user->getId()] = $user->getUserName();
        }
 
 
    // $form = $this->createFormBuilder()
    //         ->add('name')
    //         ->add('description')
    //         ->add('dateDebut', 'date', array(
    //                                             'widget' => 'single_text',
    //                                             'input' => 'datetime',
    //                                             'format' => 'MM/dd/yyyy',
    //                                             'attr' => array('class' => 'date'),
    //                                             ))
    //         ->add('dateFin', 'date', array(
    //                                             'widget' => 'single_text',
    //                                             'input' => 'datetime',
    //                                             'format' => 'MM/dd/yyyy',
    //                                             'attr' => array('class' => 'date'),
    //                                             ))
            $form   = $this->createForm(new TacheType(), $entity);
        //     ->add('user_id', 'choice', array(
        //         'choices' => $UserArray,
        //         'label' => 'userid'
        //     ))

        // ->getForm();

        return array(
            'entity' => $entity,
            'id' => $id,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tache entity.
     *
     * @Route("/{id}", name="tache_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeHomeBundle:Tache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tache entity.
     *
     * @Route("/{id}/edit", name="tache_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeHomeBundle:Tache')->find($id);
        $id_project= $entity->getProjectid()->getId();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $editForm = $this->createForm(new TacheType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'idProject' => $id_project,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Tache entity.
     *
     * @Route("/{id}", name="tache_update")
     * @Method("PUT")
     * @Template("HomeHomeBundle:Tache:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HomeHomeBundle:Tache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TacheType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tache_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tache entity.
     *
     * @Route("/{id}", name="tache_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HomeHomeBundle:Tache')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tache entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('project'));
    }

    /**
     * Creates a form to delete a Tache entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
