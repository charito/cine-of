        <div class="box-result-cnt">
            <?php
            $xc = conectar();
            $sql= "SELECT * FROM wcd_rate WHERE id_post = $post_id ";
                $query = mysqli_query($xc, $sql); 
                while($data = mysqli_fetch_assoc($query)){
                    $rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
                
            ?>
            <hr>
            <h3>The content was rated <strong><?php echo $rate_times; ?></strong> times.</h3>
            <hr>
            <h3>The rating is at <strong><?php echo $rate_value; ?></strong> .</h3>
            <hr>
            <div class="rate-result-cnt">
            <div class="rate-stars"></div>
                <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                
            </div>
            <hr>

        </div><!-- /rate-result-cnt -->