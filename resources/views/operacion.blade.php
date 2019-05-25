<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Operaciones</title>
    <script src="../js/ploy.js"></script>
    <script src="../js/bulma.js"></script>
    <script src="../js/kanban.js"></script>
    <script src="../js/tabs.js"></script>
    <link rel="stylesheet" href="../css/hero.css">
    <link rel="stylesheet" href="../css/cards.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/personal.css">
    <link rel="stylesheet" href="../css/tabs.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css" /> --}}

<body>

    <body>
        <div class="jumbotron jumbotron-fluid " style="background-color: #fff;">
            <div class="container">
                <h2 class="display-6" style="text-align:center;">BIENVENIDO </h2> 
                <div class="container-fluid">
                    <div class="panel panel-default  border  border-success">
                        <div class="panel-heading " >
                            {{-- <h3> Investigacion de operaciones </h3> --}}
                        </div>
                        <div class="panel-body border">
                            <!-- inicializamos el formulario  -->
                            <!-- Definimos el encabezado  -->
                            <br>
                            <form style="text-align:center;">
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for="">Recursos
                                    </label>
                                    <input type="text" class="label label label-default col-xs-2 col-sm-2 col-md-2"
                                        for="" id="obj1" value="Tejido Clasico">

                                    <input type="text" class="label label label-default col-xs-2 col-sm-2 col-md-2"
                                        for="" id="obj2" value="Tejido Sport">

                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2"
                                        for="">Restriccion
                                    </label>
                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2"
                                        for="">Disponibilidad
                                    </label>
                                </div>
                                <!-- definimos primera fila  -->
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <input class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""
                                        placeholder="Hilo A">
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="x1" id="x1"
                                        value=0.12>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="y1" id="y1"
                                        value=0.2>
                                    <select name="restriccion1" id="restriccion1" class="col-xs-2 col-sm-2 col-md-2">
                                        <option value="<=">
                                            <= </option> <option value=">="> >=
                                        </option>
                                    </select>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="r1" id="r1"
                                        value=500>
                                </div>
                                <!-- definimos segunda fila  -->
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <input class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""
                                        placeholder="Hilo B">
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="x2" id="x2"
                                        value=0.15>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="y2" id="y2"
                                        value=0.1>
                                    {{-- <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for="">
                                            </label> --}}
                                    <select name="restriccion2" id="restriccion2" class="col-xs-2 col-sm-2 col-md-2">
                                        <option value="<=">
                                            <= </option> <option value=">="> >=
                                        </option>
                                    </select>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="r2" id="r2"
                                        value=300>
                                </div>
                                <!-- definimos tercera fila  -->
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <input class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""
                                        placeholder="Hilo C">
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="x3" id="x3"
                                        value=0.072>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="y3" id="y3"
                                        value=0.027>
                                    {{-- <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for="">
                                            </label> --}}
                                    <select name="restriccion3" id="restriccion3" class="col-xs-2 col-sm-2 col-md-2">
                                        <option value="<=">
                                            <= </option> <option value=">="> >=
                                        </option>
                                    </select>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="r3" id="r3"
                                        value=108>
                                </div>
                                <!-- definimos cuarta fila: esta fila es para la funcion objetivo  -->
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <input class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""
                                        placeholder="Ganancia">
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="g1" id="g1"
                                        value=4000>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="number" name="g2" id="g2"
                                        value=5000>
                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for="">
                                        Y se obtiene en :
                                    </label>
                                    <input class="input col-xs-2 col-sm-2 col-md-2" type="tex" name="unidad" id="unidad"
                                        value=Dolares>
                                </div>
                                <!-- Cuadramos el boton como si fuera un bloque y dejamos los espacios  -->
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <!-- <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""></label>
                                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""></label>
                                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""></label>
                                                    <label class="label label label-default col-xs-2 col-sm-2 col-md-2" for=""></label> -->
                                    <input type="button" class="button btn btn-primary" value="calcular"
                                        onclick="calcular()">
                                </div>
                            </form>
                            <div  class="container-fluid "> 
                                <div id="chart"></div>
                                <div id="resultados">
                                    <section class="flex-fill">
                                        
                                        <label id="txt1"> </label>
                                        <label id="txt2"> </label>
                                        <label id="txt3"> </label>
                                        
                                    </section>
                                </div>
                                <section class="font-italic Italica small text-justify" id="txt">
                                    La fábrica de Hilados y Tejidos "SALAZAR" requiere fabricar dos tejidos de calidad
                                    diferente
                                    Tejido clasico y Tejido sport ; se dispone de 500 Kg de hilo a, 300 Kg de hilo b y 108
                                    Kg de
                                    hilo c. Para obtener un
                                    metro de Tejido clasico diariamente se necesitan 125 gr de a, 150 gr de b y 72 gr de c;
                                    para
                                    producir un
                                    metro de tejdo sport por día se necesitan 200 gr de a, 100 gr de b y 27 gr de c.
                                    El tejido clasico se vende a $4000 el metro y el tejido esport se vende a $5000 el
                                    metro. Si
                                    se debe obtener el
                                    máximo beneficio, ¿cuántos metros de Tejido clasico y Tejido sport se deben fabricar?
                                </section>
                            </div>
                                <br>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
        function calcular() {

            var el = document.getElementById('txt'); //se define la variable "el" igual a nuestro div
            el.style.display = (el.style.display == 'none') ? 'none' : 'none'; //damos un atributo display:none que oculta el div


            var x1 = parseFloat(document.getElementById('x1').value);
            var x2 = parseFloat(document.getElementById('x2').value);
            var x3 = parseFloat(document.getElementById('x3').value);
            var y1 = parseFloat(document.getElementById('y1').value);
            var y2 = parseFloat(document.getElementById('y2').value);
            var y3 = parseFloat(document.getElementById('y3').value);
            var r1 = parseFloat(document.getElementById('r1').value);
            var r2 = parseFloat(document.getElementById('r2').value);
            var r3 = parseFloat(document.getElementById('r3').value);
            var g1 = parseFloat(document.getElementById('g1').value);
            var g2 = parseFloat(document.getElementById('g2').value);
            var s1 = document.getElementById('restriccion1').value;
            var s2 = document.getElementById('restriccion2').value;
            var s3 = document.getElementById('restriccion3').value;
            var txt1 = document.getElementById('txt1');
            var txt2 = document.getElementById('txt2');
            var txt3 = document.getElementById('txt3');
            var obj1 = document.getElementById('obj1').value;
            var obj2 = document.getElementById('obj2').value;
            // despejando y hallandovalores primera fila 
            var ppr1 = parseFloat(r1 / x1);
            var spr1 = parseFloat(r1 / y1);
            var ppr2 = parseFloat(r2 / x2);
            var spr2 = parseFloat(r2 / y2);
            var ppr3 = parseFloat(r3 / x3);
            var spr3 = parseFloat(r3 / y3);
            var data;
            var pxr1;
            var pxr2;
            var pxr3;
            var pyr1;
            var pyr2;
            var pyr3;
            var fo1 = 0;
            var fo2 = 0;
            var fo3 = 0;
            if (x1 == 0) {
                pxr1 = 0;
                if (y1 == 0) {
                    pyr1 = 0;
                }
                else {
                    pyr1 = parseFloat(((r2 * x1) - (x2 * r1)) / ((x1 * y2) - (y1 * x2)));
                }
            }
            else {
                pxr1 = parseFloat(((r1 * y2) - (y1 * r2)) / ((x1 * y2) - (y1 * x2)));
                if (y1 == 0) {
                    pyr1 = 0;
                }
                else {
                    pyr1 = parseFloat(((r2 * x1) - (x2 * r1)) / ((x1 * y2) - (y1 * x2)));
                }
            }

            if (x2 == 0) {
                pxr2 = 0;
                if (y2 == 0) {
                    pyr2 = 0;
                }
                else {
                    pyr2 = parseFloat(((r3 * x1) - (x3 * r1)) / ((x1 * y3) - (y1 * x3)));
                }
            }
            else {
                pxr2 = parseFloat(((r1 * y3) - (y1 * r3)) / ((x1 * y3) - (y1 * x3)));
                if (y2 == 0) {
                    pyr2 = 0;
                }
                else {
                    pyr2 = parseFloat(((r3 * x1) - (x3 * r1)) / ((x1 * y3) - (y1 * x3)));
                }
            }

            // pxr2 = parseFloat(((r1 * y3) - (y1 * r3)) / ((x1 * y3) - (y1 * x3)));
            // pyr2 = parseFloat(((r3 * x1) - (x3 * r1)) / ((x1 * y3) - (y1 * x3)));

            if (x3 == 0) {
                pxr3 = 0;
                if (y3 == 0) {
                    pyr3 = 0;
                }
                else {
                    pyr3 = parseFloat(((r3 * x2) - (x3 * r2)) / ((x2 * y3) - (y2 * x3)));
                }
            }
            else {
                pxr3 = parseFloat(((r2 * y3) - (y2 * r3)) / ((x2 * y3) - (y2 * x3)));
                if (y3 == 0) {
                    pyr3 = 0;
                }
                else {
                    pyr3 = parseFloat(((r3 * x2) - (x3 * r2)) / ((x2 * y3) - (y2 * x3)));
                }
            }

            // pxr3 = parseFloat(((r2 * y3) - (y2 * r3)) / ((x2 * y3) - (y2 * x3)));
            // pyr3 = parseFloat(((r3 * x2) - (x3 * r2)) / ((x2 * y3) - (y2 * x3)));

            // console.log('con primera linea '+ fo1 +'segunda linea '+ fo2 + 'Tercera linea ' + fo3);

            var data1 = {
                x: [0, ppr1],
                y: [spr1, 0],

                line: { width: 1, color: 'red', dash: 'solid', shape: 'spline' },
                name: 'RestrccionUno',
                fill: 'tonexty',
                marker: {
                    symbol: 'circle',
                    size: 16
                }
            }
            var data2 = {
                x: [0, ppr2],
                y: [spr2, 0],
                type: 'lines',
                line: { width: 1, color: 'green', dash: 'solid', shape: 'spline' },
                name: 'RestriccionDos',
                fill: 'tonexty',
                marker: {
                    symbol: 'circle',
                    size: 16
                }
            };
            var data3 = {
                x: [0, ppr3],
                y: [spr3, 0],
                line: { width: 1, color: 'blue', dash: 'solid', shape: 'spline' },
                name: 'RestriccionTres',
                fill: 'tonexty',
                marker: {
                    symbol: 'circle',
                    size: 16
                }
            };

            var baseData = [{
                mode: 'lines',
                // line: { color: 'teal' }
            }];
            var data = [data1, data2, data3];
            var template = Plotly.makeTemplate({ data: baseData });
            var layoutWithTemplate = { template: template };


            if (pxr1 && pyr1 && pxr1 >= 0 && pyr1 >= 0) {
                var restriccion1 = ((x1 * pxr1) + (y1 * pyr1));
                if (s1 == '>=') {
                    if (restriccion1 >= r1) {
                        var data4 = {
                            x: [pxr1],
                            y: [pyr1],
                            type: 'scatter',
                            mode: 'markers',
                            marker: {
                                symbol: 'circle',
                                size: 16,
                                color: 'black'
                            },
                            name: 'Punto crítico'
                        }
                        data.push(data4);
                        fo1 = (g1 * pxr1) + (g2 * pyr1);
                        console.log(fo1);
                        txt1.innerHTML = "1) La ganancia maxima que puedes obtener  <br> con :  " +
                            g1 + ' * ' + pxr1 + ' De ' + obj1 + ' + ' + g2 + ' * ' + pyr1 + ' De ' + obj2 + ' = ' + fo1 + ' ';
                    }

                }


                else {
                    if (restriccion1 <= r1) {
                        var data4 = {
                            x: [pxr1],
                            y: [pyr1],
                            type: 'scatter',
                            mode: 'markers',
                            marker: {
                                symbol: 'circle',
                                size: 16,
                                color: 'black'
                            },
                            name: 'Punto crítico'
                        }
                        data.push(data4);
                        fo1 = (g1 * pxr1) + (g2 * pyr1);
                        console.log(fo1);

                        txt1.innerHTML = "1) La ganancia maxima que puedes obtener  <br> con :  " +
                            g1 + ' * ' + pxr1 + ' De ' + obj1 + ' + ' + g2 + ' * ' + pyr1 + ' De ' + obj2 + ' = ' + fo1 + ' ';
                    }
                }
            }

            if (pxr2 && pyr2 && pxr2 >= 0 && pyr2 >= 0) {
                if (s2 == '>=') {
                    var restriccion2 = ((x2 * pxr2) + (y2 * pyr2));
                    if (restriccion2 >= r2) {
                        var data5 = {
                            x: [pxr2],
                            y: [pyr2],
                            type: 'scatter',
                            mode: 'markers',
                            marker: {
                                symbol: 'circle',
                                size: 16,
                                color: 'blue'
                            },
                            name: 'Punto crítico'
                        }
                        fo2 = g1 * (pxr2) + g2 * (pyr2);
                        data.push(data5);
                        txt1.innerHTML = "2) La ganancia maxima que puedes obtener  <br> con :  " +
                            g1 + ' * ' + pxr2 + ' De ' + obj1 + ' + ' + g2 + ' * ' + pyr2 + ' De ' + obj2 + ' = ' + fo2 + ' ';
                    }
                }
                else {
                    var restriccion2 = ((x2 * pxr2) + (y2 * pyr2));
                    if (restriccion2 <= r2) {
                        var data5 = {
                            x: [pxr2],
                            y: [pyr2],
                            type: 'scatter',
                            mode: 'markers',
                            marker: {
                                symbol: 'circle',
                                size: 16,
                                color: 'blue'
                            },
                            name: 'Punto crítico'
                        }
                        fo2 = g1 * (pxr2) + g2 * (pyr2);
                        data.push(data5);
                        txt1.innerHTML = "2) La ganancia maxima que puedes obtener  <br> con :  " +
                            g1 + ' * ' + pxr2 + ' De ' + obj1 + ' + ' + g2 + ' * ' + pyr2 + ' De ' + obj2 + ' = ' + fo2 + ' ';
                    }
                }
            }

            if (pxr3 && pyr3 && pxr3 >= 0 && pyr3 >= 0) {
                var restriccion3 = ((x3 * pxr3) + (y3 * pyr3));
                if (s3 == '>=') {
                    if (restriccion3 >= r3) {

                        var data6 = {
                            x: [pxr3],
                            y: [pyr3],
                            type: 'scatter',
                            mode: 'markers',
                            marker: {
                                symbol: 'circle',
                                size: 16,
                                color: 'black'
                            },
                            name: 'Punto crítico'
                        }
                        fo3 = g1 * (pxr3) + g2 * (pyr3);
                        data.push(data6);
                        txt1.innerHTML = "3) La ganancia maxima que puedes obtener  <br> con :  " +
                            g1 + ' * ' + pxr3 + ' De ' + obj1 + ' + ' + g2 + ' * ' + pyr3 + ' De ' + obj2 + ' = ' + fo3 + ' ';
                    }
                }
                else {
                    if (restriccion3 <= r3) {
                        var data6 = {
                            x: [pxr3],
                            y: [pyr3],
                            type: 'scatter',
                            mode: 'markers',
                            marker: {
                                symbol: 'circle',
                                size: 16,
                                color: 'black'
                            },
                            name: 'Punto crítico'
                        }
                        var fo3 = g1 * (pxr3) + g2 * (pyr3);
                        data.push(data6);
                        txt1.innerHTML = "3) La ganancia maxima que puedes obtener  <br> con :  " +
                            g1 + ' * ' + pxr3 + ' De ' + obj1 + ' + ' + g2 + ' * ' + pyr3 + ' De ' + obj2 + ' = ' + fo3 + ' ';
                    }
                }
            }
            var layout = {
                  title: 'Cantida de Products' + obj1 + '  VS ' + obj2 ,
                  size: 16,
                xaxis: {
                    title: "Cantidad de : " + ' ' + obj1,
                    size: 16,
                },
                yaxis: {
                    title: "Cantidad de : " + ' ' + obj2,
                    size: 16,
                },
            }
            
            Plotly.newPlot('chart', data, layout);
        }
    </script>

</html>