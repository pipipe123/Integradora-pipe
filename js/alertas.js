function acceso() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '! ! ! B I E N V E N I D O ! ! !',
        text: 'Tus contactos estaran en breve',
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
        text: 'Tus contactos estaran en breve',
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
        text: 'Tus contactos estaran en breve',
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