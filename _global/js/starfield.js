function initStarfield(canvasId) {
    var canvas = document.getElementById(canvasId);
    if (!canvas) { return; }

    var ctx = canvas.getContext('2d');
    var resize = function () {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
        render();
    };
    window.addEventListener('resize', resize);

    function drawStars(count, radiusRange, colorAlpha, spikes) {
        for (var i = 0; i < count; i++) {
            var x = Math.random() * canvas.width;
            var y = Math.random() * canvas.height;
            var r = radiusRange[0] + Math.random() * (radiusRange[1] - radiusRange[0]);

            ctx.beginPath();
            ctx.fillStyle = 'rgba(138, 180, 224, ' + colorAlpha + ')';
            ctx.arc(x, y, r, 0, Math.PI * 2);
            ctx.fill();

            if (spikes) {
                ctx.strokeStyle = 'rgba(200, 221, 240, ' + (colorAlpha * 0.6) + ')';
                ctx.lineWidth = 0.5;
                ctx.beginPath();
                ctx.moveTo(x - r * 4, y);
                ctx.lineTo(x + r * 4, y);
                ctx.moveTo(x, y - r * 4);
                ctx.lineTo(x, y + r * 4);
                ctx.stroke();
            }
        }
    }

    function render() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        var nebula = ctx.createRadialGradient(
            canvas.width * 0.7, canvas.height * 0.3, 0,
            canvas.width * 0.7, canvas.height * 0.3, canvas.width * 0.6
        );
        nebula.addColorStop(0, 'rgba(58, 98, 200, 0.12)');
        nebula.addColorStop(1, 'rgba(2, 4, 8, 0)');
        ctx.fillStyle = nebula;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        drawStars(340, [0.4, 0.9], 0.35, false);
        drawStars(55, [0.8, 1.4], 0.6, false);
        drawStars(16, [1.2, 1.8], 0.9, true);
    }

    resize();
}
