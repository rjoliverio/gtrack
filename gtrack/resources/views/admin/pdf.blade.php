<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
<script src="http://www.chartjs.org/samples/latest/utils.js"></script>
    <style>
        #t2{
            border:1px solid black;
        }
        #t2 td{
            border:0.5px solid black;
        }
        #t1 tbody td{
            
        }
    </style>
  </head>
  <body>
  <center><h1>Solid Waste Management Department</h1></center>
  <center><i><h3>Barangay Poblacion, Compostela, Cebu</h3></i></center>
  <center><h1>Waste Collection Report</h1></center>
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  <p>&nbsp;&nbsp;&nbsp;This report contains the information about the status of the Solid Waste Management Department of Barangay Poblacion, Compostela, Cebu.</p>
  <p>&nbsp;&nbsp;&nbsp;The first section of the report contains the number of active trucks and personnel in the department. <br>The section also contains the total number of recognized dumpsters and the total number of performed collections as of today <i>{{ \Carbon\Carbon::parse($date)->format('m/d/Y')}}.</i></p>
    <table id="t2">
    <thead>
      <tr>
        <td><b>AVAILABLE TRUCKS</b></td>
        <td><b>AVAILABLE DRIVERS</b></td>
        <td><b>TOTAL DUMPSTERS</b></td>    
        <td><b>TOTAL NUMBER OF COLLECTIONS</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          <center>{{$trucks}}</center>
        </td>
        <td>
        <center>{{$driver}}</center>
        </td>
        <td>
        <center>{{$dump}}</center>
        </td>
        <td>
        <center>{{$collect}}</center>
        </td>
      </tr>
      </tbody>
    </table>
    
  

    <center><h4>Figure 1. <i>Active Trucks and Personnel(Drivers), Total Number of Dumpsters, and Total Number of Collections as of {{ \Carbon\Carbon::parse($date)->format('m/d/Y')}}</h4></center>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;The second section contains the <i>total collected garbage weight</i> in a scheduled weekly collection in a monthly basis. The section's topic will be presented in <i>tons.</i></p>
    <table style="border:1px solid black;margin-left:auto;margin-right:auto;">
    <thead>
      <tr>
      <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><b>DATE</b></td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><b>{{$result2[0]}}</b></td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><b>{{$result2[1]}}</b></td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black;"><b>{{$result2[2]}}</b></td>    
        <td style="border-bottom: 1px solid black;"><b>{{$result2[3]}}</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
      <td  style="border-right: 1px solid black;">
         <b> WEIGHT(in Tons)</b>
        </td>
        <td style="border-right: 1px solid black;">
          <center>{{$result[0]}}</center>
        </td>
        <td style="border-right: 1px solid black;">
          <center>{{$result[1]}}</center>
        </td>
        <td style="border-right: 1px solid black;">
          <center>{{$result[2]}}</center>
        </td>
        <td>
          <center>{{$result[3]}}</center>
        </td>
      </tr>
      </tbody>
    </table>
    <center><h4>Figure 2. <i>Garbage Weight(in Tons) Collected during the scheduled waste collections as of {{ \Carbon\Carbon::parse($date)->format('m/d/Y')}}</h4></center>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  </body>
</html>