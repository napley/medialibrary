<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Alert controller.
 *
 * @Route("admin/alert")
 */
class AlertController extends Controller
{
    /**
     * Lists all alert entities.
     *
     * @Route("/", name="admin_alert_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alerts = $em->getRepository('AppBundle:Alert')->findAll();

        return $this->render('default/admin/alert/index.html.twig', array(
            'alerts' => $alerts,
        ));
    }

    /**
     * Creates a new alert entity.
     *
     * @Route("/new", name="admin_alert_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $alert = new Alert();
        $form = $this->createForm('AppBundle\Form\AlertType', $alert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alert);
            $em->flush($alert);

            return $this->redirectToRoute('admin_alert_show', array('id' => $alert->getId()));
        }

        return $this->render('default/admin/alert/new.html.twig', array(
            'alert' => $alert,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a alert entity.
     *
     * @Route("/{id}", name="admin_alert_show")
     * @Method("GET")
     */
    public function showAction(Alert $alert)
    {
        $deleteForm = $this->createDeleteForm($alert);

        return $this->render('default/admin/alert/show.html.twig', array(
            'alert' => $alert,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing alert entity.
     *
     * @Route("/{id}/edit", name="admin_alert_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Alert $alert)
    {
        $deleteForm = $this->createDeleteForm($alert);
        $editForm = $this->createForm('AppBundle\Form\AlertType', $alert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_alert_edit', array('id' => $alert->getId()));
        }

        return $this->render('default/admin/alert/edit.html.twig', array(
            'alert' => $alert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a alert entity.
     *
     * @Route("/{id}", name="admin_alert_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Alert $alert)
    {
        $form = $this->createDeleteForm($alert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($alert);
            $em->flush($alert);
        }

        return $this->redirectToRoute('admin_alert_index');
    }

    /**
     * Creates a form to delete a alert entity.
     *
     * @param Alert $alert The alert entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Alert $alert)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_alert_delete', array('id' => $alert->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
