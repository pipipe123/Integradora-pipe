function acceso() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '¡Bienvenido al Sistema de Tickets!',
        text: `Estamos listos para ayudarte.\n Tu tranquilidad es nuestra misión.`,
        showConfirmButton: true,
        timer: 2000
      }).then(function(){
        location.href='cliente.php'
      })
}
function acceso1() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '! ! ! B I E N V E N I D O ! ! !',
        text: 'Un gusto tenerte devuelta',
        showConfirmButton: true,
        timer: 2000
      }).then(function(){
        location.href='tecnico.php'
      })
}
function acceso2() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '! ! ! B I E N V E N I D O ! ! !',
        text: 'Un gusto tenerte devuelta',
        showConfirmButton: true,
        timer: 2000
      }).then(function(){
        location.href='admin.php'
      })
}

function denegado() {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Usuario y/o contraseña incorrectos',
  })
}

function proyectont() {
  Swal.fire({
    icon: 'error',
    title: 'Intentalo de nuevo!',
    text: 'Es necesario ingresar el proyecto al que pertenece!',
  })
}


function descnt() {
  Swal.fire({
    icon: 'error',
    title: 'Intentalo de nuevo!',
    text: 'Es necesario ingresar una descripcion del fallo!',
  })
}

function imgnt() {
  Swal.fire({
    icon: 'error',
    title: 'Intentalo de nuevo!',
    text: 'Es necesario ingresar una imagen del fallo!',
  })
}


function generalno(accion,tipo){
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Oops...',
    text: `no fue posible ${accion} al ${tipo}!`,
  })
}


function generalsi(accion,tipo,lugar){
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Enhorabuena',
    text: `el ${tipo} fue ${accion} correctamente!`,
  }).then(function(){
    location.href=lugar
  })
}

function ticket() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Enhorabuena',
    text: `Ha finalizado correctamente este ticket`,
  }).then(function(){
    location.href='tecnico.php'
  })
}

function ticketn() {
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Oops...',
    text: `Ocurrio un error inesperado`,
  })
}
function actualizado(){
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Asignado',
    text: `El ticket ha sido asignado/actualizado satisfactoriamente`,
  }).then(function(){
    location.href='admin.php'
  })
}

function actualizadont() {
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Oops...',
    text: `Ocurrio un error inesperado`,
  })
}
function registrado() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: '! ! ! REGISTRADO CORRECTAMENTE ! ! !',
    text: 'Te has registrado correctamente',
    showConfirmButton: true,
    timer: 2000
  }).then(function(){
    location.href='login.php'
  })
}

function no() {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'No se pudo realizar el registro',
  }).then(function(){
    location.href='registrar.php'
  })
}
function enviado() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: '! ! ! TICKET REGISTRADO ! ! !',
    text: 'Tu ticket se ah registrado correctamente',
    showConfirmButton: true,
    timer: 2000
  }).then(function(){
    location.href='../html/index.html'
  })
}