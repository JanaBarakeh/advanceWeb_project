import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OrderDetailsSummaryComponent } from './order-details-summary.component';

describe('OrderDetailsSummaryComponent', () => {
  let component: OrderDetailsSummaryComponent;
  let fixture: ComponentFixture<OrderDetailsSummaryComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ OrderDetailsSummaryComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(OrderDetailsSummaryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
