<?php
//
//namespace App\Test\Controller;
//
//use App\Entity\User;
//use App\Repository\UserRepository;
//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\EntityRepository;
//use Symfony\Bundle\FrameworkBundle\KernelBrowser;
//use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
//
//class UserControllerTest extends WebTestCase
//{
//    private KernelBrowser $client;
//    private UserRepository $repository;
//    private string $path = '/user/';
//    private EntityManagerInterface $entityManager;
//
//    protected function setUp(): void
//    {
//        $this->client = static::createClient();
//        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(User::class);
//        $this->entityManager = $this->createMock(EntityManagerInterface::class);
//
//        foreach ($this->repository->findAll() as $object) {
//            $this->repository->remove($object, true);
//        }
//    }
//
////    public function testUserAlreadyExists(): void
////    {
////        // Arrange
////        $username = 'ziad@ziad.com';
////        $password = '12345678';
////        $hashedPassword = '$2y$13$pG.vEVVkJqdcQKXWMHVKh.VpNsLKXrzRX.SbDJSCRWFSf/vfA1N8m';
////
////        $user = new User();
////        $user->setEmail($username);
////        $user->setPassword($hashedPassword);
////        $repository = $this->createMock(EntityRepository::class);
////        $repository->expects($this->once())
////            ->method('findOneBy')
////            ->with(['username' => $username])
////            ->willReturn($user);
////        $this->entityManager->expects($this->once())
////            ->method('getRepository')
////            ->with(User::class)
////            ->willReturn($repository);
////
////        // Act
//////        $result = $this->userRegistrationService->registerUser($username, $password);
////
////        // Assert
//////        $this->assertFalse($result);
////    }
//
////    public function testIndex(): void
////    {
////        $crawler = $this->client->request('GET', $this->path);
////
////        self::assertResponseStatusCodeSame(200);
////        self::assertPageTitleContains('User index');
////
////        // Use the $crawler to perform additional assertions e.g.
////        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
////    }
//
//
//
////    public function testNew(): void
////    {
////        $originalNumObjectsInRepository = count($this->repository->findAll());
////
////        $this->markTestIncomplete();
////        $this->client->request('GET', sprintf('%snew', $this->path));
////
////        self::assertResponseStatusCodeSame(200);
////
////        $this->client->submitForm('Save', [
////            'user[email]' => 'Testing',
////            'user[roles]' => 'Testing',
////            'user[password]' => 'Testing',
////            'user[isVerified]' => 'Testing',
////        ]);
////
////        self::assertResponseRedirects('/user/');
////
////        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
////    }
////
////    public function testShow(): void
////    {
////        $this->markTestIncomplete();
////        $fixture = new User();
////        $fixture->setEmail('My Title');
////        $fixture->setRoles('My Title');
////        $fixture->setPassword('My Title');
////        $fixture->setIsVerified('My Title');
////
////        $this->repository->add($fixture, true);
////
////        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
////
////        self::assertResponseStatusCodeSame(200);
////        self::assertPageTitleContains('User');
////
////        // Use assertions to check that the properties are properly displayed.
////    }
////
////    public function testEdit(): void
////    {
////        $this->markTestIncomplete();
////        $fixture = new User();
////        $fixture->setEmail('My Title');
////        $fixture->setRoles('My Title');
////        $fixture->setPassword('My Title');
////        $fixture->setIsVerified('My Title');
////
////        $this->repository->add($fixture, true);
////
////        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));
////
////        $this->client->submitForm('Update', [
////            'user[email]' => 'Something New',
////            'user[roles]' => 'Something New',
////            'user[password]' => 'Something New',
////            'user[isVerified]' => 'Something New',
////        ]);
////
////        self::assertResponseRedirects('/user/');
////
////        $fixture = $this->repository->findAll();
////
////        self::assertSame('Something New', $fixture[0]->getEmail());
////        self::assertSame('Something New', $fixture[0]->getRoles());
////        self::assertSame('Something New', $fixture[0]->getPassword());
////        self::assertSame('Something New', $fixture[0]->getIsVerified());
////    }
////
////    public function testRemove(): void
////    {
////        $this->markTestIncomplete();
////
////        $originalNumObjectsInRepository = count($this->repository->findAll());
////
////        $fixture = new User();
////        $fixture->setEmail('My Title');
////        $fixture->setRoles('My Title');
////        $fixture->setPassword('My Title');
////        $fixture->setIsVerified('My Title');
////
////        $this->repository->add($fixture, true);
////
////        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
////
////        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
////        $this->client->submitForm('Delete');
////
////        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
////        self::assertResponseRedirects('/user/');
////    }
//}
