(function () {
  window.requestAnimFrame = (function (callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function (callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas2 = document.getElementById("sig-canvas2");
  var ctx = canvas2.getContext("2d");
  ctx.strokeStyle = "#222222";

  //ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas2.addEventListener("mousedown", function (e) {
    drawing = true;
    lastPos = getMousePos(canvas2, e);
  }, false);

  canvas2.addEventListener("mouseup", function (e) {
    drawing = false;
  }, false);

  canvas2.addEventListener("mousemove", function (e) {
    mousePos = getMousePos(canvas2, e);
  }, false);

  // Add touch event support for mobile
  canvas2.addEventListener("touchstart", function (e) {

  }, false);

  canvas2.addEventListener("touchmove", function (e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas2.dispatchEvent(me);
  }, false);

  canvas2.addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(canvas2, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas2.dispatchEvent(me);
  }, false);

  canvas2.addEventListener("touchend", function (e) {
    var me = new MouseEvent("mouseup", {});
    canvas2.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function (e) {
    if (e.target == canvas2) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function (e) {
    if (e.target == canvas2) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function (e) {
    if (e.target == canvas2) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas2.width = canvas2.width;
  }

  // Set up the UI
  var sigText2 = document.getElementById("sig-dataUrl2");
  var sigImage2 = document.getElementById("sig-image2");
  var clearBtn = document.getElementById("sig-clearBtn2");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function (e) {
    clearCanvas();
    sigText2.innerHTML = "Data URL for your signature will go here!";
    sigImage2.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function (e) {
    var dataUrl2 = canvas2.toDataURL();
    sigText2.innerHTML = dataUrl2;
    sigImage2.setAttribute("src", dataUrl2);
  }, false);

})();