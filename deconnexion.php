<<<<<<< HEAD
<?php

session_start();
unset($_SESSION['auth']);

=======
<?php

session_start();
unset($_SESSION['auth']);
unset($_SESSION['basket']);
>>>>>>> refs/remotes/origin/catherine_test
header('Location: ./');