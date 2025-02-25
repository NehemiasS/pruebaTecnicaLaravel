import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import {Alumno} from './models/alumno.model';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AlumnoService {
  
  //private apiUrl = 'http://localhost:api/alumnos'; http://localhost:8000/api
  private apiUrl = 'http://localhost/api';

  private httpOptions = {
    headers: new HttpHeaders ({
      'Authorization': 'Basic ' + btoa('admin:secret'), 
      'Content-Type': 'application/json'
    })
  };

  constructor(private http: HttpClient) { }

    // Método para crear un alumno
    crearAlumno(alumno: any): Observable<any> {
      return this.http.post<any>(`${this.apiUrl}/crear-alumno`, alumno, this.httpOptions);
    }
  
    // Método para consultar alumnos por grado
    consultarAlumnosPorGrado(grado: number): Observable<any[]> {
      return this.http.get<any[]>(`${this.apiUrl}/consultar-alumno/${grado}`, this.httpOptions);
    }
}
