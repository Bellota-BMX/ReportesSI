var wrapper1 = document.getElementById("signature-pad-1"),
  canvas1 = wrapper1.querySelector("canvas"), signaturePad1;

signaturePad1 = new SignaturePad(canvas1);

var wrapper2 = document.getElementById("signature-pad-2"),
  canvas2 = wrapper2.querySelector("canvas"), signaturePad2;

signaturePad2 = new SignaturePad(canvas2);



//Metodos para limpiar cada f

$('#clear1').on('click', function (e) {
  signaturePad1.clear();
});

$('#clear2').on('click', function (e) {
  signaturePad2.clear();
});



