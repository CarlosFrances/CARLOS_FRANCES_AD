<html>
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<form onsubmit="return verificar()" method="POST" action="matriz.php">
        <input name="tam" id="tamcaja" type="number"/>&nbsp;&nbsp;elija un tamaño (impar)<br/><br/>
        <input name="car" type="text"/>&nbsp;&nbsp;elija un caracter de relleno<br/><br/>
        <select name="ope">
            <option value="+">+</option>
            <option value="*">*</option>    
        </select>&nbsp;&nbsp;operador<br/><br/>
        <button>Go</button>
    </form>
    <script>
        var numeroCaja;
        var textoError;

        window.onload=function(){
            numeroCaja=document.getElementById("tamcaja");
            numeroCaja.value = 2;
        }

        function verificar(){
            if(!(numeroCaja.value%2)){
                Swal.fire({
                    icon: 'error',
                    title: 'CAGASTE',
                    text: 'CAGASTE',
                    footer: '<a>CAGASTE</a>'
                })
                return false;
            }else{
                return true;
            }
        }
    </script>
</body>
</html>