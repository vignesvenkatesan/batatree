Installation Instruction

1. config/config.php
 $config['base_url'] = 'http://localhost/bata2'; //set according to your appache server port location

2. config/Database.php

  //update the below config in the file according to your location.
  $db['default']['hostname'] = 'localhost';
  $db['default']['username'] = 'root';
  $db['default']['password'] = '';
  $db['default']['database'] = 'tree';

3. SQL Schema and Database in the tree.sql file.

4. assets/js/report.js && assets/js/addnode.js
    //change the below variable 
    var hostname = "localhost/bata2/";

5. application/views check
	1. tree_add_node.php 
	2. tree_dasboard.php
	Both has the proper URL for script tag added for "report.js" and "addnode.js" in respective file.
   

6. Database in tree.sql file.

7. I was unable to generlize the DB model. Since I doesn't have enough time. Since I have 100% loaded with my work.