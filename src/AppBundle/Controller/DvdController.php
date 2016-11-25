<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dvd;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dvd controller.
 *
 * @Route("admin/dvd")
 */
class DvdController extends Controller
{
    /**
     * Lists all dvd entities.
     *
     * @Route("/", name="admin_dvd_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dvds = $em->getRepository('AppBundle:Dvd')->findAll();

        return $this->render('default/admin/dvd/index.html.twig', array(
            'dvds' => $dvds,
        ));
    }

    /**
     * Creates a new dvd entity.
     *
     * @Route("/new", name="admin_dvd_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dvd = new Dvd();
        $form = $this->createForm('AppBundle\Form\DvdType', $dvd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dvd);
            $em->flush($dvd);

            return $this->redirectToRoute('admin_dvd_show', array('id' => $dvd->getId()));
        }

        return $this->render('default/admin/dvd/new.html.twig', array(
            'dvd' => $dvd,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dvd entity.
     *
     * @Route("/{id}", name="admin_dvd_show")
     * @Method("GET")
     */
    public function showAction(Dvd $dvd)
    {
        $deleteForm = $this->createDeleteForm($dvd);

        return $this->render('default/admin/dvd/show.html.twig', array(
            'dvd' => $dvd,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dvd entity.
     *
     * @Route("/{id}/edit", name="admin_dvd_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dvd $dvd)
    {
        $deleteForm = $this->createDeleteForm($dvd);
        $editForm = $this->createForm('AppBundle\Form\DvdType', $dvd);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_dvd_edit', array('id' => $dvd->getId()));
        }

        return $this->render('default/admin/dvd/edit.html.twig', array(
            'dvd' => $dvd,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dvd entity.
     *
     * @Route("/{id}", name="admin_dvd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dvd $dvd)
    {
        $form = $this->createDeleteForm($dvd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dvd);
            $em->flush($dvd);
        }

        return $this->redirectToRoute('admin_dvd_index');
    }

    /**
     * Creates a form to delete a dvd entity.
     *
     * @param Dvd $dvd The dvd entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dvd $dvd)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_dvd_delete', array('id' => $dvd->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
