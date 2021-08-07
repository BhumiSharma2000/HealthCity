
<?php

session_start();

include "header.php";




?>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js">
        
    </script>
     <div class="page-container ">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row bg-white">
                       <div class="col-lg-12 bg-white">
                    
                            <div class="col-lg-12">
                                <br>
                                <h2> Enter Records</h2>
                             
                                <form action="dianalysis.php"  method="post"  enctype="multipart/form-data" >
                             <div class="form-row">
                                     <div class="form-group col-md-3">
                                        <label for="inputState">City</label>
                                        <select id="inputState" class="form-control"  name="city">
                                            <option >All </option>
                                            <option value="Ahmedabad" >Ahmedabad</option>
                                            <option value="Vadodara">Vadodara</option>
                                            <option value="Anand">Anand</option>
                                            <option value="Dahod">Dahod</option>
                                            <option value="Kheda">Kheda</option>
                                            <option value="Mahisagar">Mahisagar</option>
                                            <option value="Panchmahal">Panchmahal</option>
                                            <option value="Gandhinagar">Gandhinagar</option>
                                            <option value="Aravalli">Aravalli</option>
                                            <option value="Banaskantha">Banaskantha</option>
                                            <option value="Mehsana">Mehsana</option>
                                            <option value="Patan">Patan</option>
                                            <option value="Sabarkantha">Sabarkantha</option>
                                            <option value="Rajkot">Rajkot</option>
                                            <option value="Botad">Bhavnagar</option>
                                            <option value="Amreli">Amreli</option>
                                            <option value="Jamnagar">Jamnagar</option>
                                            <option value="Junagadh">Junagadh</option>
                                            <option value="Morbi">Morbi</option>
                                            <option value="Porbandar">Porbandar</option>
                                            <option value="Surendranagar">Surendranagar</option>
                                            <option value="Kachchh">Kachchh</option>
                                            <option value="Surat">Surat</option>
                                            <option value="Bharuch">Bharuch</option>
                                            <option value="Dang">Dang</option>
                                            <option value="Narmada">Narmada</option>
                                            <option value="Navsari">Navsari</option>
                                            <option value="Tapi">Tapi</option>
                                            <option value="Valsad">Valsad</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputCity">Age</label>
                                        <select id="inputSsdtate" class="form-control"  name="age">
                                            <option  value="15" >13-17</option>
                                            <option  value="20" >18-24</option>
                                            <option value="30">25-34</option>
                                            <option value="40">35-44</option>
                                            <option value="50">44-54</option>
                                            <option value="60">55-64</option>
                                            <option value="70">65+</option>
                                        </select>
                                    </div>

                                   <div class="form-group col-md-3">
                                        <label for="input2"  >Gender</label>
                                        <select id="gender" class="form-control" name="gender">
                                            <option >All </option>
                                            <option value="Male" >Male</option>
                                            <option value="Female">FeMale</option>
                                        </select>
                                    </div>
                                      <div class="form-group col-md-3">
                                        <label for="inputZip">Submit</label>
                                        <input type="Submit" class="form-control btn btn-primary" style="color: white;" id="inputZip">
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>  
                    </div>


                    <div class="row">
                        
<canvas id="myChart2" height="1200" width="400"></canvas>
<script type="text/javascript">
<?php


    $city = $_POST['city'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
   $command = escapeshellcmd("C:\Users\sharm\AppData\Local\Programs\Python\Python38-32\python.exe prevailDisease.py ".$city." ".$age." ".$gender);
    $output = shell_exec($command);


   


?>
var zz = "<?php  echo $output ?>";

bmi = zz.split('#')
    bmiLabels = bmi[0].split(',')
bmiLabelsCount = bmi[1].split(',')
console.log(bmiLabels)
console.log(bmiLabelsCount)
var chartData = {

    // labels: ["January", "February", "March", "April", "May", "June"],
    labels: bmiLabels,
    datasets: [
        {

            fillColor: "#3e95cd",
            strokeColor: "#3e95cd",
             backgroundColor: ["#8e5ea2"],
            // data: [60, 80, 81, 56, 55, 40]
            data: bmiLabelsCount
        }
    ]



};

var barOptions = {

 scales: {
            yAxes: [{

                barThickness: 2,  // number (pixels) or 'flex'
                maxBarThickness: 2 // number (pixels)
            }]
        },
         title: {
        display: true,
        text: 'CITY-AGE-GENDER VISE DISEASES'
      },
  
  events: false,
  showTooltips: false,
  animation: {
    duration: 500,
     
    easing: "easeOutQuart",


    onComplete: function () {
        var ctx = this.chart.ctx;
        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
        ctx.textAlign = 'left';
        ctx.textBaseline = 'bottom';
        
        this.data.datasets.forEach(function (dataset) {
            console.log(dataset);
            for (var i = 0; i < dataset.data.length; i++) {
                var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                    scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                    left = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._xScale.left;
                    offset = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._xScale.longestLabelWidth;
                ctx.fillStyle = '#ffffff';
                var y_pos = model.y - 5;
                var label = model.label;
                // Make sure data value does not get overflown and hidden
                // when the bar's value is too close to max value of scale
                // Note: The y value is reverse, it counts from top down
                if ((scale_max - model.y) / scale_max >= 0.93)
                    y_pos = model.y + 20; 
                // ctx.fillText(dataset.data[i], model.x, y_pos);
                ctx.fillText(label, left + 10, model.y + 8);
            }
        });               
    }
  }

};

var ctx = document.getElementById("myChart2").getContext("2d");
var myBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: chartData,
                options: barOptions
            });



            </script>

                    </div>
                </div>  
                
                <!-- Content Wrapper END -->

               <?php include("footer.php");?>