<?php

namespace App\Test\Controller;

use App\Entity\EventLog;
use App\Repository\EventLogRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventLogControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EventLogRepository $repository;
    private string $path = '/event/log/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(EventLog::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

//    public function testIndex(): void
//    {
//        $crawler = $this->client->request('GET', $this->path);
//
//        self::assertResponseStatusCodeSame(200);
//        self::assertPageTitleContains('EventLog index');
//
//        // Use the $crawler to perform additional assertions e.g.
//        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
//    }

    public function testNew(): void
    {
        // get or create the user somehow (e.g. creating some users only
        // for tests while loading the test fixtures)
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail("ziad@ziad.com");
//
        dump($testUser); die();
//        $this->client->loginUser($testUser);

        // user is now logged in,
        $originalNumObjectsInRepository = count($this->repository->findAll());

//        $this->markTestIncomplete("ziad");
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'event_log[title]' => 'Testing title',
            'event_log[description]' => 'Testing description',
//            'event_log[created_at]' => new \DateTime(),
//            'event_log[updated_at]' => null,
        ]);

        self::assertResponseRedirects('/event/log/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

//    public function testShow(): void
//    {
//        $this->markTestIncomplete();
//        $fixture = new EventLog();
//        $fixture->setTitle('My Title');
//        $fixture->setDescription('My Title');
//        $fixture->setCreated_at('My Title');
//        $fixture->setUpdated_at('My Title');
//
//        $this->repository->add($fixture, true);
//
//        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
//
//        self::assertResponseStatusCodeSame(200);
//        self::assertPageTitleContains('EventLog');
//
//        // Use assertions to check that the properties are properly displayed.
//    }
//
//    public function testEdit(): void
//    {
//        $this->markTestIncomplete();
//        $fixture = new EventLog();
//        $fixture->setTitle('My Title');
//        $fixture->setDescription('My Title');
//        $fixture->setCreated_at('My Title');
//        $fixture->setUpdated_at('My Title');
//
//        $this->repository->add($fixture, true);
//
//        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));
//
//        $this->client->submitForm('Update', [
//            'event_log[title]' => 'Something New',
//            'event_log[description]' => 'Something New',
//            'event_log[created_at]' => 'Something New',
//            'event_log[updated_at]' => 'Something New',
//        ]);
//
//        self::assertResponseRedirects('/event/log/');
//
//        $fixture = $this->repository->findAll();
//
//        self::assertSame('Something New', $fixture[0]->getTitle());
//        self::assertSame('Something New', $fixture[0]->getDescription());
//        self::assertSame('Something New', $fixture[0]->getCreated_at());
//        self::assertSame('Something New', $fixture[0]->getUpdated_at());
//    }
//
//    public function testRemove(): void
//    {
//        $this->markTestIncomplete();
//
//        $originalNumObjectsInRepository = count($this->repository->findAll());
//
//        $fixture = new EventLog();
//        $fixture->setTitle('My Title');
//        $fixture->setDescription('My Title');
//        $fixture->setCreated_at('My Title');
//        $fixture->setUpdated_at('My Title');
//
//        $this->repository->add($fixture, true);
//
//        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
//
//        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
//        $this->client->submitForm('Delete');
//
//        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
//        self::assertResponseRedirects('/event/log/');
//    }
}
