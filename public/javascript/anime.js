var basicTimeline = anime.timeline({
  autoplay: true,
});

var pathEls = $(".check");
for (var i = 0; i < pathEls.length; i++) {
  var pathEl = pathEls[i];
  var offset = anime.setDashoffset(pathEl);
  pathEl.setAttribute("stroke-dashoffset", offset);
}

basicTimeline
  .add({
    targets: "#botao_receber",
    duration: 1,
    opacity: "1", //trocar p 0
  })
  .add({
    targets: "#botao_receber",
    duration: 1000,
    height: 10,
    width: 300,
    backgroundColor: "#c2ffc2",
    border: "0",
    borderRadius: 100,
  })
  .add({
    targets: ".progress-bar",
    duration: 200,
    backgroundColor: "#58ce74",
    width: 300,
    easing: "linear",
  })
  .add({
    targets: "#botao_receber",
    width: 0,
    duration: 1,
  })
  .add({
    targets: ".progress-bar",
    width: 180,
    height: 180,
    delay: 500,
    borderRadius: 100,
    backgroundColor: "#2F9E41",
  })

  .add({
    targets: pathEl,
    strokeDashoffset: [offset, 0],
    duration: 100,
    easing: "easeInOutSine",
  })
  .add({
    targets: "#botao_receber",
    duration: 1,
    opacity: "1",
  });
