<?php

declare(strict_types=1);


namespace App\Command;


use App\Owner\Infrastructure\Controllers\OwnerPostController;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Uid\Uuid;

#[AsCommand(
    name: 'app:create-owner',
    description: 'Creates a new owner.',
    aliases: ['app:add-owner'],
    hidden: false
)]
final class CreateOwnerCommand extends Command
{
    public function __construct(
        private readonly OwnerPostController $ownerPostController,
        ?string $name = null
    )
    {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $request = $this->requestOwnerData();
        ($this->ownerPostController)->create($request);

        return Command::SUCCESS;
    }

    private function requestOwnerData(): Request
    {
        $data = [
            'uuid'     => (string)Uuid::v4(),
            'name'     => 'John Doe',
            'email'    => 'john.doe@example.com',
            'password' => 'password'
        ];

        $jsonContent = json_encode($data);

        $request = Request::create(
            '/your/uri',
            'POST',
            [],
            [],
            [],
            [],
            $jsonContent
        );
        $request->headers->set('Content-Type', 'application/json');

        return $request;
    }
}