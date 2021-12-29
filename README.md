# cms-mvc
blog website using simple cms and mvc pattern

cms folder structure :

cms/Core.php is responsible for handling the URL and calling the cottect functions and modules

cms/Database.php is responsible for connecting to the database and performing quries

cms/Controller.php is responsible for calling the correct models and views and passing data to views

CMS Usage :
any controller should extend cms/Controller.php.
any model should create an instance of cms/Database.php in it's constructor.
models file names and class name should be identical.
controller names and functions names should match the URL (for example /posts/add will call the function add() in the class Posts).

Project Usage:

edit .htaccess file if you change the folder structure,

if you don't change the folder structure you should only edit app/config/config.php file to get started (change lines 6,7,8 according to your database configration)

this app excepects database name 'share_post' user name 'root' password ''.


