
    <?php
    function alert($str){
        echo"
        <section id='alert'>
            <div class='alert_box'>
                <div class='php_alert'>
                    <p>$str</p>
                    <button class='alert_btn' onclick='alertd()'> ok</button>
                </div>
            </div>
        </section>
        ";
    }
    ?>