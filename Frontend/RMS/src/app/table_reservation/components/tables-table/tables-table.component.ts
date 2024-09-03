import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-tables-table',
  templateUrl: './tables-table.component.html',
})
export class TablesTableComponent {
  @Input() tables: any[] = [];
  @Input() title: string = '';
}
