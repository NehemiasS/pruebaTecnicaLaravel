import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
//import { HttpClient, HttpClientModule } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { AlumnosComponent } from './alumnos/alumnos.component';  

@NgModule({
  declarations: [
    AppComponent,
    AlumnosComponent
  ],
  imports: [
    HttpClientModule,
    BrowserModule,
    FormsModule 
  ],
  providers: [],
  bootstrap: [AppComponent]  
})
export class AppModule { }
