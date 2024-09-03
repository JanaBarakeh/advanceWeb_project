import { Component, inject, OnInit } from '@angular/core';
import { TableService } from '../../Services/TableService';

@Component({
  selector: 'app-tables-page',
  templateUrl: './tables-page.component.html',
})
export class TablesPageComponent implements OnInit {
  reservedTables: any[] = [];
  availableTables: any[] = [];
  tableService = inject(TableService);

  ngOnInit(): void {
    this.loadReservedTables();
    this.loadAvailableTables();
  }

  loadReservedTables() {
    this.tableService.getReservedTables().subscribe((data) => {
      this.reservedTables = data;
    });
  }

  loadAvailableTables() {
    this.tableService.getAvailableTables().subscribe((data) => {
      this.availableTables = data;
    });
  }
}
