import { Component, OnInit } from '@angular/core';
import { AlumnoService } from '../alumno.service';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
// import { AlumnoService } from 'src/app/services/alumno.service';
import {Alumno} from '../models/alumno.model';

@Component({
  selector: 'app-alumnos',
  standalone: true ,
  imports: [FormsModule,
    CommonModule,
    HttpClientModule
  ],
  templateUrl: './alumnos.component.html',
  styleUrls: ['./alumnos.component.css']
})

export class AlumnosComponent implements OnInit {
  nuevoAlumno : Alumno = {
    nombre: '',
    fecha_nacimiento: '',
    nombre_padre: '',
    nombre_madre: '',
    grado: 0,
    seccion: '',
    fecha_ingreso: ''
  };
  
  
  grado: number = 0;
  gradoConsulta:number = 0;
  alumnos: any[] = [];
  // variable a number

  constructor(private alumnoService: AlumnoService ) { }

   ngOnInit(): void {
   }

  // Método para crear un alumno
   crearAlumno() {
      this.alumnoService.crearAlumno(this.nuevoAlumno).subscribe((response: any) => {
        alert('Alumno registrado con éxito');
        this.alumnos = []; // Limpia el array correctamente
        this.nuevoAlumno = {  // Limpia el formulario de nuevoAlumno
          nombre: '',
          fecha_nacimiento: '',
          nombre_padre: '',
          nombre_madre: '',
          grado: 0,
          seccion: '',
          fecha_ingreso: ''
        };
      }, (error: any) => {
        alert('Error al registrar alumno');
        console.error(error);
      });
    
  }

  //  alumnos por grado
  consultarAlumnos() {
    this.alumnoService.consultarAlumnosPorGrado(this.gradoConsulta).subscribe(
      (response: Alumno[]) => {  // Especifica que la respuesta es un array de Alumno
        this.alumnos = response;
      },
      (error: any) => {
        alert('Error al consultar alumnos');
        console.error(error);
      }
    );
}
}
