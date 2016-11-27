<?php
// src/AppBundle/EventListener/SearchIndexer.php
namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Book;
use AppBundle\Entity\Dvd;
use AppBundle\Entity\Bluray;

class ArticleAlert
{
    protected $mailer;
    
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        
        if ($entity instanceof Book) {
            $em = $args->getEntityManager();
            $alerts = $em->getRepository('AppBundle:Alert')->findEmailByAlert('author', $entity->getAuthor());
            
            foreach ($alerts as $alert) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Hello Email')
                    ->setFrom('postmaster@android-dev.fr')
                   // ->setTo($alert['email'])
                    ->setTo('postmaster@android-dev.fr')
                    ->setBody("A new book match in medialibrary : ".$entity->getTitle())
                    ;

                $this->mailer->send($message);
            }
            
            return;
        }
        
        if ($entity instanceof Dvd) {
            $em = $args->getEntityManager();
            $alerts = $em->getRepository('AppBundle:Alert')->findEmailByAlert('director', $entity->getDirector());
            
            foreach ($alerts as $alert) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Hello Email')
                    ->setFrom('postmaster@android-dev.fr')
                   // ->setTo($alert['email'])
                    ->setTo('postmaster@android-dev.fr')
                    ->setBody("A new dvd match in medialibrary : ".$entity->getTitle())
                    ;

                $this->mailer->send($message);
            }
        }
        
        if ($entity instanceof Bluray) {
            $em = $args->getEntityManager();
            $alerts = $em->getRepository('AppBundle:Alert')->findEmailByAlert('director', $entity->getDirector());
            
            foreach ($alerts as $alert) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Hello Email')
                    ->setFrom('postmaster@android-dev.fr')
                   // ->setTo($alert['email'])
                    ->setTo('postmaster@android-dev.fr')
                    ->setBody("A new bluray match in medialibrary : ".$entity->getTitle())
                    ;

                $this->mailer->send($message);
            }
        }
        
        
        return;

    }
}