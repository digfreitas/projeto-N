<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: #ecf0f1;
            overflow: hidden; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .video-container {
            width: 100%;
            max-width: 560px; 
            height: auto;
            aspect-ratio: 16 / 9; 
            margin: 20px auto;
            border-radius: 12px;
            border: 4px solid #3498db;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .video-container:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }
        .video-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .text {
            margin-top: 20px;
            color: #e74c3c;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 0 0 10px #e74c3c, 0 0 20px #e74c3c, 0 0 30px #e74c3c;
        }
        .glow-pulse {
            animation: pulse 2s infinite, glow 1.5s infinite alternate;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        @keyframes glow {
            from {
                text-shadow: 0 0 10px #e74c3c, 0 0 20px #e74c3c, 0 0 30px #e74c3c;
            }
            to {
                text-shadow: 0 0 20px #e74c3c, 0 0 30px #e74c3c, 0 0 40px #e74c3c;
            }
        }

        .sparkles {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; 
            z-index: 9999; 
        }
        .sparkle {
            position: absolute;
            width: 5px;
            height: 5px;
            background: white;
            border-radius: 50%;
            opacity: 0;
        }

        @media (max-width: 768px) {
            .text {
                font-size: 20px;
                margin-top: 15px;
            }
            .video-container {
                max-width: 90%;
                aspect-ratio: 16 / 9; 
            }
        }

        @media (max-width: 480px) {
            .text {
                font-size: 18px;
                margin-top: 10px;
            }
            .video-container {
                max-width: 95%;
                aspect-ratio: 16 / 9; 
            }
        }
    </style>
</head>
<body>
    <div class="video-container">                                 <!--MUDA AQUI E BOTA O ID DO VIDEO-->
        <iframe src="https://www.youtube.com/embed/i_AKGvikteY?controls=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="sparkles" id="sparkles"></div>

    <script>
        function createSparkle(x, y) {
            const sparkle = document.createElement('div');
            sparkle.classList.add('sparkle');
            sparkle.style.left = `${x}px`;
            sparkle.style.top = `${y}px`;
            document.getElementById('sparkles').appendChild(sparkle);

            sparkle.animate([
                { transform: 'scale(1)', opacity: 1 },
                { transform: 'scale(2)', opacity: 0 }
            ], {
                duration: 1000,
                easing: 'ease-out',
                fill: 'forwards'
            });

            setTimeout(() => {
                sparkle.remove();
            }, 1000);
        }

        function spawnSparkles() {
            const sparklesContainer = document.getElementById('sparkles');
            const width = sparklesContainer.clientWidth;
            const height = sparklesContainer.clientHeight;

            for (let i = 0; i < 20; i++) {
                setTimeout(() => {
                    const x = Math.random() * width;
                    const y = Math.random() * height;
                    createSparkle(x, y);
                }, i * 100);
            }
        }

        setInterval(spawnSparkles, 2000);
    </script>
</body>
</html>
