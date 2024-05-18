<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Lareduca

Lareduca es un CRM, dedicado al ambito escolar, con él tanto profesores como estudiantes pueden vigilar los cursos en los que imparten clases o atienden, atender a las tareas que deben programar o entregar además de una sección con "juegos" interactivos cuyo resultado podrá utilizarse como nota de tareas.

## Instalación

<p>Sigue estos pasos para configurar el proyecto en tu máquina local:</p>

<ol>
  <li>Descarga <a href="https://laragon.org/download/index.html"> Laragon </a> y <a href="https://getcomposer.org/"> Composer </a>.</li>
</ol>

<ol>
  <li>Clona este repositorio en tu máquina local usando Git o descargalo:</li>
</ol>

<pre>
    <code>git clone https://github.com/EFL28/Lareduca.git</code>
</pre>

<p>Asegurate que la ubicación final del proyecto sea laragon/www/lareduca </p>

<ol start="2">
  <li>Navega al directorio del proyecto:</li>
</ol>

<pre>
    <code>cd Lareduca</code>
</pre>

<ol start="3">
  <li>Instala las dependencias utilizando composer:</li>
</ol>

<pre>
    <code>composer install</code>
</pre>

<ol start="4">
  <li>Inicia Laragon y en el apartado de Base de Datos ejecuta el archivo .sql</li>
</ol>

<ol start="6">
  <li>Inicia el desarrollo con el siguiente comando. </li>
</ol>

<pre>
    <code>php artisan serve</code>
</pre>

<p>Esto iniciará el servidor de desarrollo y abrirá la aplicación en tu navegador predeterminado. Si no se abre automáticamente, puedes acceder a la aplicación en <code>http://localhost:8000</code>.</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).