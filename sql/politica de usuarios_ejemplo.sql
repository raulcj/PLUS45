--usuario fjtalrio: permisos select,insert,update en Contabilidad(Clientes,Productos) y Administracion(Empleados,Nominas)

grant select,insert,update on Contabilidad.Clientes to 'fjtalrio'@'192.168.2.3' identified by 'fjtalrio';
grant select,insert,update on Contabilidad.Productos to 'fjtalrio'@'192.168.2.3';
grant select,insert,update on Administracion.Empleados to 'fjtalrio'@'192.168.2.3';
grant select,insert,update on Administracion.Nominas to 'fjtalrio'@'192.168.2.3';

--usuario jbaufer: permisos select,insert,update en Contabilidad(Facturas,DetalleFacturas) y Administracion(Pagos,Recibos)

grant select,insert,update on Contabilidad.Facturas to 'jbaufer'@'192.168.2.3' identified by 'jbaufer';
grant select,insert,update on Contabilidad.DetalleFacturas to 'jbaufer'@'192.168.2.3';
grant select,insert,update on Administracion.Pagos to 'jbaufer'@'192.168.2.3';
grant select,insert,update on Administracion.Recibos to 'jbaufer'@'192.168.2.3';

--usuario invitado: consultar todas las BBDD

grant select on Contabilidad.* to 'invitado'@'192.168.2.3' identified by 'invitado';
grant select on Administracion.* to 'invitado'@'192.168.2.3';

