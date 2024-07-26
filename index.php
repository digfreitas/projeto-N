<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clica</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .envelope-container {
            position: relative;
            width: 90%;
            max-width: 600px;
            height: 350px;
            perspective: 1000px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .envelope {
            width: 100%;
            height: 100%;
            background-color: #e0e0e0;
            border: 2px solid #333;
            border-radius: 5px;
            position: absolute;
            top: 0;
            left: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 1s cubic-bezier(0.25, 0.1, 0.25, 1), opacity 1s ease-in-out;
            z-index: 2;
        }
        .envelope:before {
            content: '';
            position: absolute;
            top: -80px;
            left: 0;
            width: 100%;
            height: 80px;
            background-color: #e0e0e0;
            border-bottom: 2px solid #333;
            border-radius: 5px 5px 0 0;
            clip-path: polygon(0 100%, 50% 0, 100% 100%);
            transition: transform 1s ease-in-out;
        }
        .envelope.open:before {
            transform: rotateX(-180deg);
        }
        .envelope-text {
            line-height: 350px;
            color: #333;
            font-size: 4vw;
            font-weight: bold;
            margin: 0;
            position: relative;
            z-index: 3;
            cursor: pointer;
        }
        .hidden-content {
            width: 100%;
            height: 100%;
            padding: 30px;
            background-color: white;
            border: 2px solid #333;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: left;
            box-sizing: border-box;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }
        .hidden-content.active {
            opacity: 1;
            transform: scale(1);
        }
        .envelope.open {
            transform: translateY(30px) scale(0.95);
            opacity: 0;
        }
        button {
            border-radius: 6px;
            width: 100%;
            max-width: 350px;
            height: 50px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            transform-origin: center;
        }
        button:hover {
            transform: scale(1.2);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            background-color: grey;
        }
        button:active {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .envelope-container {
                height: 320px; 
            }
            .envelope-text {
                font-size: 6vw;
                line-height: 280px;
            }
            .hidden-content {
                padding: 20px;
            }
            button {
                height: 40px;
            }
        }
        
        @media (max-width: 480px) {
            .envelope-container {
                height: 390px; 
            }
            .envelope-text {
                font-size: 8vw;
                line-height: 300px;
            }
            .hidden-content {
                padding: 20px;
            }
            button {
                height: 35px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="envelope-container" id="envelopeContainer">
        <div class="envelope" id="envelope">
            <div class="envelope-text">Abra</div>
        </div>
        <div class="hidden-content" id="hiddenContent">
            <h1>ATENÇÃO</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur sequi similique aut blanditiis incidunt maxime doloremque a sunt, quisquam libero omnis aliquid minus in natus mollitia culpa voluptas ea facilis.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet veritatis inventore recusandae ullam ducimus magni, eum neque iusto autem eveniet ipsam, aut accusamus facere officiis cum nam, veniam non! Dolorum.</p>
            <button onclick="window.location.href='video.php';">ASSISTIR VÍDEO</button>
            <p>Ass:</p>
        </div>
    </div>

    <script>
        document.getElementById('envelope').addEventListener('click', function() {
            document.querySelector('.envelope').classList.add('open');
            setTimeout(function() {
                document.querySelector('.envelope').style.display = 'none';
                document.getElementById('hiddenContent').classList.add('active');
            }, 1000);
        });
    </script>
</body>
</html>
