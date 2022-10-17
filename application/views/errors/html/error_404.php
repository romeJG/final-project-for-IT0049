<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$ci = new CI_Controller();
$ci = &get_instance();
$ci->load->helper('url');
?>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Lobster+Two:ital@0;1&family=Playfair+Display:wght@500&display=swap');

	html,
	body {
		width: 100%;
		height: 100%;
		overflow: hidden;
	}

	body {
		background-image: url(<?= base_url(); ?>assets/404/woods.jpg);
		background-color: black;
		background-size: cover;
		background-repeat: no-repeat;
		min-height: 100vh;
		min-width: 100vw;
		font-family: 'Lobster Two', cursive;
		color: rgba(255, 255, 255, .87);
	}

	.mx-auto {
		margin-left: auto;
		margin-right: auto;
	}

	.container,
	.container>.row,
	.container>.row>div {
		height: 100%;
	}

	#countUp {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 100%;
	}

	.number {
		font-size: 20rem;
		font-weight: 500;
		position: relative;
		z-index: 999 !important;
	}

	.text {
		margin: 0 0 1rem;
	}


	.text {
		font-weight: 300;
		font-size: 1.2rem;
		text-align: center;
		font-family: 'Playfair Display', serif;
	}

	.glow {
		color: #fff;
		text-align: center;
		-webkit-animation: glow 2s ease-in-out infinite alternate;
		-moz-animation: glow 2s ease-in-out infinite alternate;
		animation: glow 2s ease-in-out infinite alternate;
	}

	@-webkit-keyframes glow {
		from {
			text-shadow:
				0 0 10px #fff,
				0 0 20px #89cbff,
				0 0 30px #89cbff,
				0 0 40px #89cbff,
				0 0 50px #89cbff,
				0 0 60px #89cbff,
				0 0 70px #89cbff;
		}

		to {
			text-shadow:
				0 0 20px #fff,
				0 0 30px #add8e6,
				0 0 40px #add8e6,
				0 0 50px #add8e6,
				0 0 60px #add8e6,
				0 0 70px #add8e6,
				0 0 80px #add8e6;
		}
	}

	#canvas {
		filter: blur(0.8px);
		position: absolute;
		left: 0;
		top: 0;
		z-index: -1;
	}
</style>



<canvas id="canvas"></canvas>

<div class="container">
	<div class="row">
		<div class="xs-12 md-6 mx-auto">
			<div id="countUp">
				<div class="number glow">404</div>
				<div class="text">Looks like you got lost</div>
				<a href="<?= base_url(); ?>">
					<div class="button glow">Go Home</div>
				</a>
			</div>
		</div>
	</div>
</div>


<script>
	let c = init("canvas");
	w = canvas.width = window.innerWidth;
	h = canvas.height = window.innerHeight;
	// initiation

	class firefly {
		constructor() {
			this.x = Math.random() * w;
			this.y = Math.random() * h;
			this.s = Math.random() * 2;
			this.ang = Math.random() * 2 * Math.PI;
			this.v = (this.s * this.s) / 4;
		}
		move() {
			this.x += this.v * Math.cos(this.ang);
			this.y += this.v * Math.sin(this.ang);
			this.and += (Math.random() * 20 * Math.PI) / 180 - (10 * Math.PI) / 180;
		}
		show() {
			c.beginPath();
			c.arc(this.x, this.y, this.s, 0, 2 * Math.PI);
			c.fillStyle = "#fddba3";
			c.fill();
		}
	}
	let f = [];

	function draw() {
		if (f.length < 100) {
			for (let j = 0; j < 10; j++) {
				f.push(new firefly());
			}
		}
		//animation
		for (let i = 0; i < f.length; i++) {
			f[i].move();
			f[i].show();
			if (f[i].x < 0 || f[i].x > w || f[i].y < 0 || f[i].y > h) {
				f.splice(i, 1);
			}
		}
	}

	let mouse = {};
	let last_mouse = {};

	canvas.addEventListener(
		"mouseover",
		function(e) {
			last_mouse.x = mouse.x;
			last_mouse.y = mouse.y;

			mouse.x = e.pageX - this.offsetLeft;
			mouse.y = e.pageY - this.offsetTop;
		},
		false
	);

	function init(elemid) {
		let canvas = document.getElementById(elemid),
			c = canvas.getContext("2d"),
			w = (canvas.width = window.innerWidth),
			h = (canvas.height = window.innerHeight);
		c.fillStyle = "rgba(30, 30, 30, 1)";
		c.fillRect(0, 0, w, h);
		return c;
	}
	window.requestAnimationFrame = function() {
		return (
			window.requestAnimationFrame ||
			function(callback) {
				window.setTimeout(callback);
			}
		);
	};

	function loop() {
		window.requestAnimationFrame(loop);
		c.clearRect(0, 0, w, h);
		draw();
	}
	window.addEventListener("resize", function() {
		(w = canvas.width = window.innerWidth),
		(h = canvas.height = window.innerHeight);
		loop();
	});
	loop();
	setInterval(loop, 1000 / 60);
</script>