<?php
include("./navbar.php");
?>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@400&display=swap');
    </style>
<head>
    <link rel="stylesheet" href="index.css">
</head>
    
    <br>

    <main>

        <div class="container">
           <div class="headimage">
                <img src="logo.png" height=120px>
            </div>
            <div class="content">
                <h1>Fr. Conceicao Rodrigues Institute of Technology.</h1>
                <p>Agnel Technical Education Complex, Juhu Nagar, Sector 9A, Vashi, Navi Mumbai, Maharashtra 400703</p>
            </div>
        </div>

<br>
    <h3>OUR SERVICES :</h3><br>
    <!-- <form action="connection.php" method="post">
    <div class="button">
        <div class="card">
            <button type="button" onclick="showcard('card1')" class="block" name="Print">Prints</button>
            <div id="card1" style="display: none;">
                <div class="card-body">
                    Quantity: <input type="number">
                </div>
            </div>
        </div>


        <div class="card">
        <button type="button" onclick="showcard('card2')" class="block" name="Xerox">XEROX</button>
        <div id="card2" style="display: none;">
            <div class="card-body">
                Quantity: <input type="number">
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card3')" class="block" name="hbands">Hardbound and sheets set</button>
        <div id="card3" style="display: none;">
            <div class="card-body">
                Quantity: <input type="number">
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card4')" class="block" name="hb">Hardbound</button>
        <div id="card4" style="display: none;">
            <div class="card-body">
                Quantity: <input type="number">
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card5')" class="block" name="sheets">Sheets</button>
        <div id="card5" style="display: none;">
            <div class="card-body">
                Quantity: <input type="number">
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card6')" class="block" name="Index">Index pages</button>
        <div id="card6" style="display: none;">
            <div class="card-body">
                Quantity: <input type="number">
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card7')" class="block" name="Graph">Graph pages</button>
        <div id="card7" style="display: none;">
            <div class="card-body">
                Quantity: <input type="number">
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card8')" class="block" name="Icard">ID card</button>
        <div id="card8" style="display: none;">
            <div class="card-body">
                <input type="checkbox">ID with holder.<br>
                <input type="checkbox">ID Holder.
            </div>
        </div>
        </div>
        
        <div class="card">
        <button type="button" onclick="showcard('card9')" class="block" name="Fest">Fest fees</button>
        <div id="card9" style="display: none;">
            <div class="card-body">
               Event: <input type="text">
            </div>
        </div>
        </div>

        <div class="card">
        <button type="button" onclick="showcard('card10')" class="block" name="Club">Club fees</button>
        <div id="card10" style="display: none;">
            <div class="card-body">
            <label for="club">Choose club:</label>
                <select name="club" id="club">
                <option value="1">NSS</option>
                <option value="2">IEEE</option>
                <option value="3">CSI</option>
                <option value="4">E-cell</option>
                <option value="5">Marathi Mandal</option>
                <option value="6">Robotics</option>
            </div>
        </div>
        </div>
        
        <div style="text-align:center; margin-bottom: 20px; border:2px solid red; z-index:111; display:block;">
            <button type="submit">Submit</button>
        </div>

    </div>
    
    
    </form> -->
    

    <form action="connection.php" method="post">
        <div class="opt">
            <div class="card">
                <input type="checkbox" id="card1" class="quant" name="Print"><label for="card1"><h2>Prints</h2></label>
                <input id="card1" type="number" placeholder="Quantity">
            </div>

            <div class="card">
                <input type="checkbox" id="card2" class="quant" name="Xerox"><label for="card2"><h2>Xerox</h2></label>
                <input id="card2" type="number" placeholder="Quantity">
            </div>
            
            <div class="card">
                <input type="checkbox" id="card3" class="quant" name="hbands"><label for="card3"><h2>Hardbound and sheets</h2></label>
                <input id="card3" type="number" placeholder="Quantity">
            </div>

            <div class="card">
                <input type="checkbox" id="card4" class="quant" name="hb"><label for="card4"><h2>Hardbound</h2></label>
                <input id="card4" type="number" placeholder="Quantity">
            </div>

            <div class="card">
                <input type="checkbox" id="card5" class="quant" name="sheets"><label for="card5"><h2>Sheets</h2></label>
                <input id="card5" type="number" placeholder="Quantity">
            </div>

            <div class="card">
                <input type="checkbox" id="card6" class="quant" name="Index"><label for="card6"><h2>Index sheets</h2></label>
                <input id="card6" type="number" placeholder="Quantity">
            </div>

            <div class="card">
                <input type="checkbox" id="card7" class="quant" name="Graph"><label for="card7"><h2>Graph sheets</h2></label>
                <input id="card7" type="number" placeholder="Quantity">
            </div>

            <div class="card">
                <input type="checkbox" id="card8" class="quant" name="Icard"><label for="card8"><h2>ID card</h2></label>
                <input id="card8" type="text" placeholder="Id card or holder">
            </div>

            <div class="card">
                <input type="checkbox" id="card9" class="quant" name="Club"><label for="card9"><h2>Club fees</h2></label>
                <!-- <input id="card9" type="text" placeholder="Enter club"> -->
                <div class="card-body">
                    <select name="club" id="club">
                        <option value="default">Choose Club</option>
                        <option value="1">NSS</option>
                        <option value="2">IEEE</option>
                        <option value="3">CSI</option>
                        <option value="4">E-cell</option>
                        <option value="5">Marathi Mandal</option>
                        <option value="6">Robotics</option>
                    </select>
                </div>
            </div>

            <div class="card">
                <input type="checkbox" id="card10" class="quant" name="Fest"><label for="card10"><h2>Fest fees</h2></label>
                <!-- <input id="card10" type="text" placeholder=" Enter event"> -->
                <div class="card-body">
                    <select name="club" id="club">
                        <option value="default">Choose Fest</option>
                        <option value="1">ETAMAX</option>
                        <option value="2">FACES</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="submit">SUBMIT</button>
    </form>

</main>