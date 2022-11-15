<?php
    
?>
<div class="modal fade" id="modal_cart" tobindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <modal-title id="exampleModalLabel">My carrito</modal-title>
                <button class="btn-clase" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-body">
                    <div class="p-2">
                        <?php
                            session_start();
                            if(isset($_SESSION['carrito'])){
                                $total=0;
                                for($i=0;$i<=count($myCar)-1;$i++){
                                    if(isset($myCar[$i])){
                                        if($myCar[$i]!=NULL){ ?>

                                            <li class="list-group-item">
                                                <div class="row col-12">
                                                    <div class="col-6 p-0"><h6 class="my-0">Cantidad:<?php echo myCar['cantidad']; ?>  <?php echo $myCar[$i]['titulo']; ?> </h6></div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>