<?php
/**
 * Created by PhpStorm.
 * User: rocky
 * Date: 2022-06-21
 * Time: 17:55
 */
namespace Tadm\service\command;

use Symfony\Component\Console\Input\InputOption;
use think\migration\command\migrate\Run;

class MigrateRun extends Run
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('admin:migrate:run')
            ->setDescription('Migrate the database')
            ->addOption('--path', null, InputOption::VALUE_REQUIRED, 'path')
            ->addOption('--target', '-t', InputOption::VALUE_REQUIRED, 'The version number to migrate to')
            ->addOption('--date', '-d', InputOption::VALUE_REQUIRED, 'The date to migrate to')
            ->setHelp(<<<EOT
The <info>migrate:run</info> command runs all available migrations, optionally up to a specific version

<info>php think migrate:run</info>
<info>php think migrate:run -t 20110103081132</info>
<info>php think migrate:run -d 20110103</info>
<info>php think migrate:run -v</info>

EOT
            );
    }
    protected function getPath()
    {
        if($this->input->hasOption('path')){
            return $this->input->getOption('path');
        }else{
            return plugin()->thinkphp->getPath() .DIRECTORY_SEPARATOR. 'database' . DIRECTORY_SEPARATOR . 'migrations';
        }
        
    }
}