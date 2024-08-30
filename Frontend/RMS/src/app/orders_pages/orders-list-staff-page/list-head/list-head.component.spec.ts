import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListHeadComponent } from './list-head.component';

describe('ListHeadComponent', () => {
  let component: ListHeadComponent;
  let fixture: ComponentFixture<ListHeadComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ListHeadComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListHeadComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
