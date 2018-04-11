<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // setup the autoloading
            require_once 'FST/vendor/autoload.php';
            // setup Propel 
            require_once 'FST/generated-conf/config.php';
            
            //blablablablabla
            
            /*CRUD*/
            echo '<h4>Basic CRUD implementation with Propel</h4><br/>';
            
            //Count number of Ingredients
            echo "Number of ingredients currently created: ".IngredientQuery::create()->count()."<br/><br/>";    
            
            echo "CREATING ingredient 'Mehl' ...<br/>";
            /*Create*/
            $ingredient = new Ingredient();
            $ingredient->setIngredientId(1);
            $ingredient->setDescription("Mehl");
            $ingredient->setPrice(200.3);
            $ingredient->save(); 
            echo "Number of ingredients currently created: ".IngredientQuery::create()->count()."<br/><br/>";
            
            /*Read*/
            echo "READING recently created ingredient: ...<br/>";
            echo "ID: ".$ingredient->getIngredientId();
            echo "<br/>Bezeichnung: ".$ingredient->getDescription();
            echo "<br/>Price: ".$ingredient->getPrice();
            
            /*Update*/
            echo "<br/><br/>UPDATING price of ingredient with ID: 1 ...<br/>";
            $ingredient= IngredientQuery::create()->findOneByIngredientId(1);
            $ingredient->setPrice(50.1);
            $ingredient->save();
            
            echo "ID: ".$ingredient->getIngredientId();
            echo "<br/>Bezeichnung: ".$ingredient->getDescription();    
            echo "<br/>Price: ".$ingredient->getPrice(); 
                        
            /*Delete*/
            echo "<br/><br/>Number of ingredients currently created: ".IngredientQuery::create()->count()."<br/>DELETE ingredient with ID:1 ...<br/>";
            $ingredient= IngredientQuery::create()->findOneByIngredientId(1);
            $ingredient->delete();
            echo "Number of ingredients currently created: ".IngredientQuery::create()->count();
            
            /*Advanced*/
            echo "<br/>------------------------------------------------------------------------------<br/><h4>Advanced</h4><br/>Creating 3 Ingredients ...";
            $ingredient = new Ingredient();
            $ingredient->setIngredientId(1);$ingredient->setDescription("Mehl");$ingredient->setPrice(200.3);
            $ingredient->save(); 
            
            $ingredient2 = new Ingredient();
            $ingredient2->setIngredientId(2);$ingredient2->setDescription("Zucker");$ingredient2->setPrice(5.2);
            $ingredient2->save();
            
            $ingredient3 = new Ingredient();
            $ingredient3->setIngredientId(3);$ingredient3->setDescription("Ei");$ingredient3->setPrice(1.5);
            $ingredient3->save();
            echo "<br/>Number of ingredients currently created: ".IngredientQuery::create()->count();
            echo "<br/><br/>Display result in HTML table ...";
            echo "<table border='1'><thead><th>Id</th><th>Description</th><th>Price</th></thead>".
                    "<tr><td>".$ingredient->getIngredientId()."</td><td>".$ingredient->getDescription()."</td><td>".$ingredient->getPrice()."</td></tr>".
                    "<tr><td>".$ingredient2->getIngredientId()."</td><td>".$ingredient2->getDescription()."</td><td>".$ingredient2->getPrice()."</td></tr>".
                    "<tr><td>".$ingredient3->getIngredientId()."</td><td>".$ingredient3->getDescription()."</td><td>".$ingredient3->getPrice()."</td></tr></table>";
            
            echo "<br/>Find highest price ...<br/>";
            $highestPrice = 0;
            $ingredients = IngredientQuery::create()->find();
            foreach($ingredients as $ingredient) {
              if($ingredient->getPrice()>$highestPrice)$highestPrice=$ingredient->getPrice();
            } 
            echo $highestPrice;
            
            echo "<br/><br/>Delete all ingredients ...<br/>";
            $ingredients = IngredientQuery::create()
                ->find();
            $ingredients->delete();
            echo "Number of ingredients currently created: ".IngredientQuery::create()->count();
        ?>
    </body>
</html>
