<?php

namespace AuctionBundle\Controller;

use AuctionBundle\Entity\Account;
use AuctionBundle\Entity\Admin;
use AuctionBundle\Entity\User;
use AuctionBundle\Form\AccountType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Account controller.
 *
 * @Route("account")
 */
class AccountController extends Controller
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Lists all account entities.
     *
     * @Route("/", name="account_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $accounts = $em->getRepository('AuctionBundle:Account')->findAll();

        return $this->render('account/index.html.twig', array(
            'accounts' => $accounts,
        ));
    }

    /**
     * Creates a new account entity.
     *
     * @Route("/register", name="account_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $account = new Admin();
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $account->setPassword($this->encoder->encodePassword($account,$account->getPassword()));
            $em->persist($account);
            $em->flush();

            return $this->redirectToRoute('account_show', array('id' => $account->getId()));
        }

        return $this->render('account/new.html.twig', array(
            'account' => $account,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a account entity.
     *
     * @Route("/{id}", name="account_show")
     * @Method("GET")
     */
    public function showAction(Account $account)
    {
        $deleteForm = $this->createDeleteForm($account);

        return $this->render('account/show.html.twig', array(
            'account' => $account,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing account entity.
     *
     * @Route("/{id}/edit", name="account_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Account $account)
    {
        $deleteForm = $this->createDeleteForm($account);
        $editForm = $this->createForm('AuctionBundle\Form\AccountType', $account);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('account_edit', array('id' => $account->getId()));
        }

        return $this->render('account/edit.html.twig', array(
            'account' => $account,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a account entity.
     *
     * @Route("/{id}", name="account_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Account $account)
    {
        $form = $this->createDeleteForm($account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($account);
            $em->flush();
        }

        return $this->redirectToRoute('account_index');
    }

    /**
     * Creates a form to delete a account entity.
     *
     * @param Account $account The account entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Account $account)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('account_delete', array('id' => $account->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
