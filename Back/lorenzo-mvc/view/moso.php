<div style="font-size: 10vh; color: white; bgcolor: black;">
<strong>

    <form action="">
    
        Moso pedido: <br>
        <input type="text" placeholder="MESA QR"> <input type="text" placeholder="NOMBRE CLIENTE"> <br>
        ----- <br>
        <input type="submit" value="+">

        <select name="menuplatos" onchange="this.form.submit()">
        <option value=0 <?php if(isset($_POST['menuplatos']) && $_POST['menuplatos'] == '1') 
        echo 'selected'; ?>>PLATILLOS</option>
        <?php   
        //for ($i=0; $i < sizeof($id_pt); $i++) { 
        foreach ($productos as $pt){
            $id_pt=$pt['id']; $np_pt=$pt['nombre_producto'];      
        ?>

        <option <?php echo"value='$id_pt'"; if(isset($_POST['menuplatos']) && $_POST['menuplatos'] == $id_pt) 
        echo 'selected'; echo">".$np_pt."</option>"; ?>
        
        <?php
        }
        ?>

        </select>
        <?php

        if (isset($_POST["menuplatos"])) {
            if ($_POST["menuplatos"]==0) {
                echo"[+$]";
            }else{
                echo "[".$pr_pt[$_POST["menuplatos"]-1]."$]";
            }
        }else{echo"[+$]";}

        ?>
        <br>
        <img src="" alt="" width="100" height="100">
        <textarea name="" id="" cols="30" rows="10" placeholder="DETALLES"></textarea> <br>
        ----- <br>
        <input type="submit" value="+">
        <select name="" id="">
            <option value="">DESCUENTOS</option> <option value="">1</option> <option value="">2</option>
        </select>[-$] <br>
        ----- <br>
        -PLATILLO <br>
        -PLATILLO <br>
        -DESCUENTO <br>
        -DESCUENTO <br>
        [TOTAL$]<br>

        <input type="submit">
    </form>



</strong>
</div>