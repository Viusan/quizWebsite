<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Easter Egg</title>
</head>
<body>
    <div class="circle"></div>




    
    <script>
        let circle = document.querySelector('.circle');
        let moveBy = 10;

        window.addEventListener('load', () =>  {
            circle.style.position = 'absolute';
            circle.style.left = 0;
            circle.style.top = 0;
        });

        window.addEventListener('keyup', (e) => {
            switch (e.key){
                case 'ArrowLeft':
                    circle.style.left = parseInt(circle.style.left) - moveBy + 'px';
                    break;
                case 'ArrowRight':
                    circle.style.left = parseInt(circle.style.left) + moveBy + 'px';
                    break;
                case 'ArrowUp':
                    circle.style.top = parseInt(circle.style.top) - moveBy + 'px';
                    break;
                case 'ArrowDown':
                    circle.style.top = parseInt(circle.style.top) + moveBy + 'px';
                    break;        
            }
        })
    </script>
</body>
</html>