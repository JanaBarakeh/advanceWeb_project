import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OrderDetailsItemsComponent } from './order-details-items.component';

describe('OrderDetailsItemsComponent', () => {
  let component: OrderDetailsItemsComponent;
  let fixture: ComponentFixture<OrderDetailsItemsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ OrderDetailsItemsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(OrderDetailsItemsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
