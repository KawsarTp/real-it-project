<?php 
    require("class/fpdf.php");
    include_once'lib/Database.php';
    include_once 'helper/Formate.php';
    include 'class/makequotation.php';
    
 ?>

<?php 

      $data = new makeQuotation();
      $result = $data->getData();
      $access = $data->getaccess();
      
        
     
      
// A4 width :219mm
// default margin :10mm each side
// writable horizontal : 219-(10*2)=189mm


 $pdf =new FPDF();
 $pdf ->AddPage();
 // set font to arial, bold, 20pt
 $pdf ->SetFont("Arial","B",20);

 // cell (width,heigt,text,border,end line,[align])
 $pdf ->Cell(70,5,"");
 $pdf ->Cell(63,5,"Real IT Ltd");
  $pdf ->Cell(56,5,"",0,1);// end of line

// set font to arial regular,12pt
 $pdf ->SetFont("Arial","",10);

 $pdf ->Cell(70,5,"H#01,R#01(Main Road)",0,0);
 $pdf ->Cell(70,5,"",0,0);
 $pdf ->Cell(49,5,"Cell:+880 1678696200",0,1); // end of line

 $pdf ->Cell(70,5,"Flat# D3,katasur",0,0);
 $pdf ->Cell(70,5,"",0,0);
 $pdf ->Cell(49,5,"Email: info@realitbd.net",0,1); // end of line

  $pdf ->Cell(70,5,"Mohammadpur,Dhaka-1207",0,0);
 $pdf ->Cell(70,5,".",0,0);
 $pdf ->Cell(49,5,"www.realitbd.net",0,1); // end of line


 
 $pdf ->Cell(189,1,"",1,1); // end of line (Space)

        if ($result) {
       foreach ($result as $value) {
         
          

 $pdf ->Cell(160,5,"Quotation No :{$value['serialNo']}",0,0);
 $pdf ->Cell(12,5,"Date :",0,0); 
 $pdf ->Cell(15,5,"{$value['day']}",0,1); // end of line

  $pdf ->Cell(189,5,"",0,1); // end of line (Space)


 // set font to arial, bold, 20pt
 $pdf ->SetFont("Arial","B",14);

 $pdf ->Cell(120,5,"",0,1);// end of line


 $pdf ->SetFont("Arial","",10);

  $pdf ->Cell(10 ,5,"",0,0);
  $pdf ->Cell(38 ,5,"Name/Company Name",0,0);
  $pdf ->Cell(50 ,5,":{$value['name']}",0,1);

  $pdf ->Cell(10 ,5,"",0,0);
  $pdf ->Cell(38 ,5,"Email ",0,0);
  $pdf ->Cell(50 ,5,":{$value['email']}",0,1);

  $pdf ->Cell(10 ,5,"",0,0);
  $pdf ->Cell(38 ,5,"Address ",0,0);
  $pdf ->Cell(50 ,5,":{$value['address']}",0,1);

  $pdf ->Cell(10 ,5,"",0,0);
  $pdf ->Cell(38 ,5,"Phone ",0,0);
  $pdf ->Cell(50 ,5,":{$value['mobile']}",0,1);

$pdf ->Cell(189,6,"",0,1); // end of line (Space)




  $pdf ->Cell(1 ,5,"",0,0);
  $pdf ->Cell(40 ,5,"Refers to your",0,0);
  $pdf ->Cell(100 ,5,": Official enquiry",0,1);

  $pdf ->Cell(1 ,5,"",0,0);
  $pdf ->Cell(40 ,5,"Shipment/Delivery ",0,0);
  $pdf ->Cell(134 ,5,": Immediate out of ready stock(Subject to availability) or within 15 days form date of work order. ",0,1);

 $pdf ->SetFont("Arial","B",10);

  $pdf ->Cell(1 ,5,"",0,0);
  $pdf ->Cell(40 ,5,"Terms of Payment ",0,0);
  $pdf ->Cell(134 ,5,": Full Payment is due at the time of placing work order.",0,1);

  $pdf ->Cell(1 ,5,"",0,0);
  $pdf ->Cell(40 ,5,"Validity of Quotation",0,0);
  $pdf ->Cell(134 ,5,": Upto 15 days, Subject to exchange rate and duty structure remaining unchange.",0,1);

 $pdf ->Cell(189,5,"",0,1); // end of line (Space)

$pdf ->SetFont("Arial","B",12);

 $pdf ->Cell(10 ,5,"SL#",1,0);
 $pdf ->Cell(100 ,5,"Description/accessories",1,0);
 $pdf ->Cell(25 ,5,"Qyt",1,0); 
  $pdf ->Cell(25 ,5,"Unit Price",1,0);
 $pdf ->Cell(25,5,"Total Price",1,1); // end of line



// invoice contents
 

 $pdf ->SetFont("Arial","",10);

// Number are right-aligned so we give 'R' after new line parameter
 $pdf ->Cell(10 ,5,"1",1,0);
 $pdf ->Cell(100 ,5,"{$value['model']}",1,0);
 $pdf ->Cell(25 ,5,"{$value['quantity']}",1,0); 
  $pdf ->Cell(25 ,5,"{$value['unitprice']}",1,0);
 $pdf ->Cell(25,5,"{$value['totalprice']}",1,1); // end of line

 // 
}}

$pdf ->SetFont("Arial","",10);
if ($access) {
  $i =1;
  foreach ($access as $t) {
   $i++;

// Number are right-aligned so we give 'R' after new line parameter
 $pdf ->Cell(10 ,5,"{$i}",1,0);
 $pdf ->Cell(100 ,5,"{$t['name']}",1,0);
 $pdf ->Cell(25 ,5,"{$t['quantity']}",1,0); 
  $pdf ->Cell(25 ,5,"{$t['unitprice']}",1,0);
 $pdf ->Cell(25,5,"{$t['totalprice']}",1,1); // end of line

   }
}
  

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

$pdf ->Cell(0,10,'Address :H#01,R#01(Main Road),Flat# D3,katasur,Mohammadpur,Dhaka-1207',0,1,'C');
// Instanciation of inherited class

$pdf->AliasNbPages();


$filename = $value['mobile'].".pdf";
$dir ="admin/pdf/";
$content=  $pdf->Output($dir.$filename,"D"); 
$content1=  $pdf->Output($dir.$filename,"F"); 
$content2=  $pdf->Output('',"S"); 
header("Content-disposition: attachment; filename=$filename");
header("Content-type: application/pdf");
readfile($filename); 



 ?>