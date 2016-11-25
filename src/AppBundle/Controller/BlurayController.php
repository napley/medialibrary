<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bluray;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bluray controller.
 *
 * @Route("admin/bluray")
 */
class BlurayController extends Controller
{
    /**
     * Lists all bluray entities.
     *
     * @Route("/", name="admin_bluray_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blurays = $em->getRepository('AppBundle:Bluray')->findAll();

        return $this->render('default/admin/bluray/index.html.twig', array(
            'blurays' => $blurays,
        ));
    }

    /**
     * Creates a new bluray entity.
     *
     * @Route("/new", name="admin_bluray_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bluray = new Bluray();
        $form = $this->createForm('AppBundle\Form\BlurayType', $bluray);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bluray);
            $em->flush($bluray);

            return $this->redirectToRoute('admin_bluray_show', array('id' => $bluray->getId()));
        }

        return $this->render('default/admin/bluray/new.html.twig', array(
            'bluray' => $bluray,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bluray entity.
     *
     * @Route("/{id}", name="admin_bluray_show")
     * @Method("GET")
     */
    public function showAction(Bluray $bluray)
    {
        $deleteForm = $this->createDeleteForm($bluray);

        return $this->render('default/admin/bluray/show.html.twig', array(
            'bluray' => $bluray,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bluray entity.
     *
     * @Route("/{id}/edit", name="admin_bluray_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bluray $bluray)
    {
        $deleteForm = $this->createDeleteForm($bluray);
        $editForm = $this->createForm('AppBundle\Form\BlurayType', $bluray);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_bluray_edit', array('id' => $bluray->getId()));
        }

        return $this->render('default/admin/bluray/edit.html.twig', array(
            'bluray' => $bluray,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bluray entity.
     *
     * @Route("/{id}", name="admin_bluray_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bluray $bluray)
    {
        $form = $this->createDeleteForm($bluray);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bluray);
            $em->flush($bluray);
        }

        return $this->redirectToRoute('admin_bluray_index');
    }

    /**
     * Creates a form to delete a bluray entity.
     *
     * @param Bluray $bluray The bluray entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bluray $bluray)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_bluray_delete', array('id' => $bluray->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
