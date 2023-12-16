import { Routes } from '@angular/router';
import { Desbravador } from './models/desbravador';
import { DesbravadorComponent } from './components/desbravador/desbravador.component';
import { HomeComponent } from './pages/home/home.component';

export const routes: Routes = [
    {path: '', component: HomeComponent}    
];
