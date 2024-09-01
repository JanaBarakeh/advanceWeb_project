import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MenuPageComponent } from './menu-page/menu-page.component';
import { ReserveTablePageComponent } from './table_reservation/pages/reserve_table_page/reserve-table-page/reserve-table-page.component';
const routes: Routes = [
  { path: 'menu-page', component: MenuPageComponent },
  { path: 'table-reservation', component: ReserveTablePageComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
