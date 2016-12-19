# puja-log

Puja-Log are the handler layers, that handle all fatal exceptions/errors ( include fatal errors) from PHP application. Support  callback function

<strong>Install</strong>
<pre>composer require puja-log</pre>

<strong>Usage</strong>
<pre>include '/path/to/vendor/autoload.php';
use Puja\Logger\Logger;</pre>

<strong>Example</strong>
<h3>Log File</h3>
<pre>use Puja\Log\Logger;
 $configures = array(
     'adapters' => array(
         'default' => array(
             'driver' => 'File',
             'priority' => Logger::INFO,
             'save_path' => __DIR__ . '/',
             'file_log' => 'application.log'
         )
     )
 );
 Logger::getAdapter()->info($e); // save to application.log
 Logger::getAdapter()->debug($e, array('bin' => 'test')); // save to test.log
 </pre>

<h3>Log Db</h3>
<pre>
$configures = array(
    'write_adapter_name' => 'master',
    'adapters' => array(
        'default' => array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '123',
            'dbname' => 'fwcms',
            'charset' => 'utf8',
        ),
        'master' => array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '123',
            'dbname' => 'fwcms',
            'charset' => 'utf8',
        )
    )
);

use Puja\Db\Adapter;
new Adapter($configures);

use Puja\Log\Logger;
$configures = array(
    'adapters' => array(
         'default' => array(
             'driver' => 'Db',
             'priority' => Logger::INFO,
             'log_table' => 'puja_log_table', // table that stored log data
             'create_table' => true, // should enable at very first run and disable after that
         )
    )
);
Logger::getAdapter()->info($e); // save to application.log
Logger::getAdapter()->debug($e, array('bin' => 'test')); // save to test.log
</pre>
