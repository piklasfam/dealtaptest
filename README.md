<h2>Read me</h2>
<h3>Contents</h3>
<ul>
    <li><a href = "#setup">Set up</a></li>
    <li><a href = "#files">File Structure</a></li>
    <li><a href = "#backend">Back End</a></li>
    <li><a href = "#frontend">Front End</a></li>
</ul>
<h3 id = "setup">Set up</h3>
<ol>
    <li>Php version 5.5.12</li>
    <li>Wamp Apache server version 2.4.9</li>
    <li>I have used gulp, angularjs and less, and bootstrap for basic css. less files are already compiled into one css file, so it is not needed to install anything</li>   
    <li>To see its working you need to put it into www folder in your Apache</li>
</ol>
<h3 id = "files">File Structure</h3>
<ul>
    <li>root
        <ul>
            <li>angular - angularhs file</li>
            <li>css - there are less folder for less files, compiled css files in root of this folder</li>
            <li>images</li>
            <li>jquery</li>
            <li>js - custom js files</li>
            <li>pages - html pages - divided for convenience
                <ul>
                    <li>widgets.html - statistical data</li>
                    <li>readme.html - instructions & explanations</li>
                </ul>
            </li>
            <li>php files:
                <ul>
                    <li>getAnimalData.php - general php file with object instances</li>
                    <li>animalClass.php - classes</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<h3 id = 'backend'>Backend</h3>
<p>The were 2 major architectural decision on this project: </p>
<ul><li> decide if base class should be abstract</li>
    <li> decide on "creational" design pattern </li>
</ul>
<p>To do it I prepared the requirement for the class, it should contain:</p>
<ol><li> a property <code>serial number</code> (which have to be a prime number less then 10000)</li> 
    <li>a method to generate these serial numbers <li>
    <li>a method to write results into file. </li>
</ol>

<p>Since the child classes of the base class are supposed to use these methods in the same way and have the same property, 
   I decided NOT to make animal class abstract, because 
   a)I do not need different methods for child classes right now, and I do not want to implement the same code twice. 
   b) if I will need other functionality for these methods I can override it.</p>
<p>The base class has 3 methods : </p>
<ul><li>public SetSerialNumbers($min, $max, $count) - receive $min - integer min limit to start generating numbers, 
        $max - integer, max limit and $count - how many numbers to generate, by providing these input parameters I am 
        maximising my freedom of future use of this class.</li>
    <li>private IsPrime($number) - checks if the number that was generated is a prime number (i.e. can be divided only to 
        itself or 1). 
        Optimization of basic algorithm : 1. We don't have to check every single number between 1 and n, it's 
        enough to check only the numbers between [2, sqrt(n)]. This is correct, because if n isn't prime it can be represented
        as p*q = n. Of course if p > sqrt(n), which we assume can't be true, that will mean that q < sqrt(n).</li>
    <li>public SaveToFile($filename, $data) - receives filename and data to save and saves it to file with php function file_put_contents().</li>
</ul>  
<p>
The child classes Goat and Sheep are inherit base class functionality and because of this can be instantiated in each one 
constractor. Objects are created in with the correct input parameters and then numbers saved to files. 
After this we have to compare each set of serial numbers are equal. This is done with array_intersect() function - it returns an array containing 
all of the values in array1 whose values exist in all of the parameters and saved to the third file.
</p>
<h3 id = 'frontend'>Front End</h3>
<p>Front end is build on the base bootstrap css and angularjs base file. I have chose to add angularjs because of its powerful 
    functionality. For example, populate table with data from several data objects without a need to write loops in jquery, among other things 
    (Populate table with data is done with the help of <code>ng-repeat</code> directive.)
<ul><li>app.js - initialize modules in angularjs, as well as factory service which connects to php via http post 
        method and receives data in json format.</li>
    <li>main.js - the main file, connects to service and makes math actions with data and puts it to $scope to be presented on the page in widgets.
    This is done for optimization reasons to reduce load from the server, these are the things that can be easily done on the front end.
    All the mathematical functions where done inside one loop for optimization reasons, because we know that the length of two 
    objects are the same. If they would not be the same I would make a loop on the longest object and insert a check that other 
    object is still exist at given index.</li>

</p>
