/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     14-12-2024 13:23:31                          */
/*==============================================================*/


drop table if exists ASESORIA;

drop table if exists CERTIFICADO;

drop table if exists CONTENIDO;

drop table if exists CURSO;

drop table if exists DOCENTE;

drop table if exists ESTUDIANTE;

drop table if exists EVALUACION;

drop table if exists LECCION;

drop table if exists MODULOS;

drop table if exists PAGO;

drop table if exists PERMISOS;

drop table if exists PREGUNTAS_EVALUACION;

drop table if exists PRESENTA;

drop table if exists REALIZA;

drop table if exists RECURSOS;

drop table if exists RESPUESTA_EVALUACION;

drop table if exists ROLES;

drop table if exists ROL_PERMISOS;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: ASESORIA                                              */
/*==============================================================*/
create table ASESORIA
(
   ID_ASESORIA          int not null,
   COD_CURSO            int not null,
   ID                   int not null,
   DOC_ID               int not null,
   FECHA_ASESORIA       date,
   ESTADO               varchar(10),
   primary key (ID_ASESORIA)
);

/*==============================================================*/
/* Table: CERTIFICADO                                           */
/*==============================================================*/
create table CERTIFICADO
(
   COD_CERTIFICADO      int not null,
   COD_CURSO            int not null,
   ID                   int not null,
   DESCRIPCION_CERTIFICADO text,
   primary key (COD_CERTIFICADO)
);

/*==============================================================*/
/* Table: CONTENIDO                                             */
/*==============================================================*/
create table CONTENIDO
(
   ID_CONTENIDO         INT NOT NULL AUTO_INCREMENT,

   ID_LECCION           int not null,
   TITULO_CONTENIDO     varchar(50),
   SUB_TITULO           varchar(100),
   CUERPO_CONTENIDO     text,
   CREACION_CONTENIDO   date,
   primary key (ID_CONTENIDO)
);

/*==============================================================*/
/* Table: CURSO                                                 */
/*==============================================================*/
create table CURSO
(
   COD_CURSO            int not null,
   ID                   int not null,
   NOMBRE_CURSO         varchar(50),
   FECHA_INICIO         date,
   FECHA_FIN            date,
   ESTADO               varchar(10),
   DESCRIPCION_CURSO    text,
   primary key (COD_CURSO)
);

/*==============================================================*/
/* Table: DOCENTE                                               */
/*==============================================================*/
create table DOCENTE
(
   ID                   int not null,
   ESPECIALIDAD         varchar(50),
   primary key (ID)
);

/*==============================================================*/
/* Table: ESTUDIANTE                                            */
/*==============================================================*/
create table ESTUDIANTE
(
   ID                   int not null,
   N_MATRICULA          int,
   primary key (ID)
);

/*==============================================================*/
/* Table: EVALUACION                                            */
/*==============================================================*/
create table EVALUACION
(
   COD_EVALUACION       int not null,
   COD_CURSO            int not null,
   ID                   int not null,
   FECHA_DIAGNOSTICO    date,
   DESCRIPCION_EVALUACION text,
   NOMBRE_EVALUACION    varchar(50),
   primary key (COD_EVALUACION)
);

/*==============================================================*/
/* Table: LECCION                                               */
/*==============================================================*/
create table LECCION
(
   ID_LECCION           INT NOT NULL AUTO_INCREMENT,

   ID_MODULO            int not null,
   NOMBRE_LECCION       varchar(50),
   primary key (ID_LECCION)
);

/*==============================================================*/
/* Table: MODULOS                                               */
/*==============================================================*/
create table MODULOS
(
   ID_MODULO            INT NOT NULL AUTO_INCREMENT,

   COD_CURSO            int not null,
   NOMBRE_MODULO        varchar(50),
   primary key (ID_MODULO)
);

/*==============================================================*/
/* Table: PAGO                                                  */
/*==============================================================*/
create table PAGO
(
   FOLIO                int not null,
   ID_ASESORIA          int not null,
   ID                   int not null,
   METODO_PAGO          varchar(20),
   MONTO                int,
   FECHA_PAGO           date,
   primary key (FOLIO)
);

/*==============================================================*/
/* Table: PERMISOS                                              */
/*==============================================================*/
create table PERMISOS
(
   ID_PERMISO           INT NOT NULL AUTO_INCREMENT,
   NOMBRE_PERMISO       varchar(255),
   primary key (ID_PERMISO)
);

/*==============================================================*/
/* Table: PREGUNTAS_EVALUACION                                  */
/*==============================================================*/
create table PREGUNTAS_EVALUACION
(
   ID_PREGUNTA          INT NOT NULL AUTO_INCREMENT,

   COD_EVALUACION       int not null,
   ID                   int not null,
   PREGUNTA             text,
   COMENTARIO           text,
   TIPO_PREGUNTA        text,
   RESPUESTA_CORRECTA   text,
   ALTERNATIVA          text,
   FECHA_PREGUNTA       date,
   primary key (ID_PREGUNTA)
);

/*==============================================================*/
/* Table: PRESENTA                                              */
/*==============================================================*/
create table PRESENTA
(
   ID                   int not null,
   COD_EVALUACION       int not null,
   primary key (ID, COD_EVALUACION)
);

/*==============================================================*/
/* Table: REALIZA                                               */
/*==============================================================*/
create table REALIZA
(
   ID                   int not null,
   COD_CURSO            int not null,
   primary key (ID, COD_CURSO)
);

/*==============================================================*/
/* Table: RECURSOS                                              */
/*==============================================================*/
create table RECURSOS
(
   COD_RECURSO          int not null,
   ID_LECCION           int not null,
   NOMBRE_RECURSO       varchar(50),
   TIPO_RECURSO         varchar(50),
   DESCRIPCION_RECURSO  text,
   primary key (COD_RECURSO)
);

/*==============================================================*/
/* Table: RESPUESTA_EVALUACION                                  */
/*==============================================================*/
create table RESPUESTA_EVALUACION
(
   ID_RESPUESTA         INT NOT NULL AUTO_INCREMENT,

   ID_PREGUNTA          int not null,
   COD_EVALUACION       int not null,
   ID                   int not null,
   FECHA_RESPUESTA      date,
   RESPUESTA            text,
   primary key (ID_RESPUESTA)
);

/*==============================================================*/
/* Table: ROLES                                                 */
/*==============================================================*/
create table ROLES
(
   ID_ROL              INT NOT NULL AUTO_INCREMENT,

   NOMBRE_ROL           varchar(255),
   primary key (ID_ROL)
);

/*==============================================================*/
/* Table: ROL_PERMISOS                                          */
/*==============================================================*/
create table ROL_PERMISOS
(
   ID_PERMISO           int not null,
   ID_ROL               int not null,
   primary key (ID_PERMISO, ID_ROL)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID                   INT NOT NULL AUTO_INCREMENT,

   ID_ROL               int not null,
   RUT_USUARIO          int,
   NOMBRE_PERMISO       varchar(255),
   APELLIDO             varchar(255),
   CORREO               varchar(30),
   CONTRASENIA          char(255),
   REGION               varchar(20),
   COMUNA               varchar(20),
   primary key (ID)
);

alter table ASESORIA add constraint FK_BRINDA foreign key (DOC_ID)
      references DOCENTE (ID) on delete restrict on update restrict;

alter table ASESORIA add constraint FK_REQUIERE foreign key (COD_CURSO)
      references CURSO (COD_CURSO) on delete restrict on update restrict;

alter table ASESORIA add constraint FK_SOLICITA foreign key (ID)
      references ESTUDIANTE (ID) on delete restrict on update restrict;

alter table CERTIFICADO add constraint FK_EMITE foreign key (COD_CURSO)
      references CURSO (COD_CURSO) on delete restrict on update restrict;

alter table CERTIFICADO add constraint FK_OBTIENE foreign key (ID)
      references ESTUDIANTE (ID) on delete restrict on update restrict;

alter table CONTENIDO add constraint FK_TIENE foreign key (ID_LECCION)
      references LECCION (ID_LECCION) on delete restrict on update restrict;

alter table CURSO add constraint FK_IMPARTE foreign key (ID)
      references DOCENTE (ID) on delete restrict on update restrict;

alter table DOCENTE add constraint FK_INHERITANCE_2 foreign key (ID)
      references USUARIO (ID) on delete restrict on update restrict;

alter table ESTUDIANTE add constraint FK_INHERITANCE_1 foreign key (ID)
      references USUARIO (ID) on delete restrict on update restrict;

alter table EVALUACION add constraint FK_ASIGNA foreign key (COD_CURSO)
      references CURSO (COD_CURSO) on delete restrict on update restrict;

alter table EVALUACION add constraint FK_DESARROLLA foreign key (ID)
      references DOCENTE (ID) on delete restrict on update restrict;

alter table LECCION add constraint FK_DIVIDE foreign key (ID_MODULO)
      references MODULOS (ID_MODULO) on delete restrict on update restrict;

alter table MODULOS add constraint FK_PERTENECE foreign key (COD_CURSO)
      references CURSO (COD_CURSO) on delete restrict on update restrict;

alter table PAGO add constraint FK_EFECTUA foreign key (ID)
      references ESTUDIANTE (ID) on delete restrict on update restrict;

alter table PAGO add constraint FK_GENERA foreign key (ID_ASESORIA)
      references ASESORIA (ID_ASESORIA) on delete restrict on update restrict;

alter table PREGUNTAS_EVALUACION add constraint FK_ADQUIERE foreign key (COD_EVALUACION)
      references EVALUACION (COD_EVALUACION) on delete restrict on update restrict;

alter table PREGUNTAS_EVALUACION add constraint FK_RELATIONSHIP_15 foreign key (ID)
      references DOCENTE (ID) on delete restrict on update restrict;

alter table PRESENTA add constraint FK_PRESENTA foreign key (ID)
      references ESTUDIANTE (ID) on delete restrict on update restrict;

alter table PRESENTA add constraint FK_PRESENTA2 foreign key (COD_EVALUACION)
      references EVALUACION (COD_EVALUACION) on delete restrict on update restrict;

alter table REALIZA add constraint FK_REALIZA foreign key (COD_CURSO)
      references CURSO (COD_CURSO) on delete restrict on update restrict;

alter table REALIZA add constraint FK_REALIZA2 foreign key (ID)
      references ESTUDIANTE (ID) on delete restrict on update restrict;

alter table RECURSOS add constraint FK_RELATIONSHIP_13 foreign key (ID_LECCION)
      references LECCION (ID_LECCION) on delete restrict on update restrict;

alter table RESPUESTA_EVALUACION add constraint FK_DISPONE foreign key (COD_EVALUACION)
      references EVALUACION (COD_EVALUACION) on delete restrict on update restrict;

alter table RESPUESTA_EVALUACION add constraint FK_POSEE foreign key (ID_PREGUNTA)
      references PREGUNTAS_EVALUACION (ID_PREGUNTA) on delete restrict on update restrict;

alter table RESPUESTA_EVALUACION add constraint FK_RESPONDE foreign key (ID)
      references ESTUDIANTE (ID) on delete restrict on update restrict;

alter table ROL_PERMISOS add constraint FK_ROL_PERMISOS foreign key (ID_PERMISO)
      references PERMISOS (ID_PERMISO) on delete restrict on update restrict;

alter table ROL_PERMISOS add constraint FK_ROL_PERMISOS2 foreign key (ID_ROL)
      references ROLES (ID_ROL) on delete restrict on update restrict;

alter table USUARIO add constraint FK_USER_ROLES foreign key (ID_ROL)
      references ROLES (ID_ROL) on delete restrict on update restrict;

