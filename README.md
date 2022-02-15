La prueba no hace falta que sea funcional, solo esperamos buenas prácticas de desarrollo y que sepas defenderlo.

Queremos poder gestionar una BBDD de usuarios y que los mismos puedan cambiar su email para ello necesitamos los siguientes casos de uso:

1. Crear un usuario
2. Cambiar email del usuario

.- Requerido:
Uso de buenas prácticas de desarrollo.
Aplicación de los diferentes patrones de diseño.
Aplicación de arquitectura hexagonal.

.- No requerido:
No implementar la parte de la infraestructura.

.- Agregados
Tienen que extender de App\Shared\Domain\AbstractAggregateRoot para que se puedan coleccionar y obtener los eventos generados de los cambios de estado.
No hace falta que los hagas recursivos lo métodos de modificación de estado.

.- Eventos
Tienen que implementar la interfaz App\Shared\Domain\EventInterface.

.- Publisher
Utiliza esta interfaz para publicar los eventos coleccionados.