/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controlador;

import Modelo.Cita;
import Modelo.Especialidad;
import Modelo.LugarAtencion;
import Modelo.Persona;
import java.io.IOException;
import java.io.PrintWriter;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.hibernate.Session;

/**
 *
 * @author ADMIN
 */
public class controllerCita extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String action = request.getParameter("a");
        
        switch(action){
            case "create":
                create(request, response);
                break;
            case "update":
                update(request, response);
                break;
            case "delete":
                delete(request, response);
                break; 
            case "Atendido":
            Atendido(request, response);
            break;
            case "Cancelado":
                Cancelado(request, response);
                break;
            case "Update":
            Update(request, response);
            break;
                
            case "admin":
               admin(request, response);
               break;
               
            case "MisCitas":
               misCitas(request, response);
               break;
            case "MiAgendaPaciente":
               MiAgendaPaciente(request, response);
               break;
            
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

    private void create(HttpServletRequest request, HttpServletResponse response) {
        if(request.getMethod().equalsIgnoreCase("POST")){
            
            String hora = request.getParameter("txthora");
            String estado = request.getParameter("txtestado");
            String observaciones = request.getParameter("txtobservaciones");
            String doctor = request.getParameter("doctor");
            String paciente = request.getParameter("paciente");
            String especialidad = request.getParameter("especialidad");
            String lugar = request.getParameter("lugar");
            
           Cita cit = new Cita();
           cit.setHora(hora);
           cit.setEstado(estado);
           cit.setObservaciones(observaciones);
           
           
            Date fecha;
            try{
                fecha = new SimpleDateFormat("yyyy-MM-dd").parse(request.getParameter("txtfecha"));
                cit.setFecha(fecha);
            }catch(ParseException pe){
                
            }
            
          
            
            Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
            Persona doc = (Persona) sesion.get(Persona.class, Integer.parseInt(doctor));
            Persona paci = (Persona) sesion.get(Persona.class, Integer.parseInt(paciente));
            Especialidad esp = (Especialidad) sesion.get(Especialidad.class, Integer.parseInt(especialidad));
            LugarAtencion lug = (LugarAtencion) sesion.get(LugarAtencion.class, Integer.parseInt(lugar));
            cit.setIddoctor(doc);
            cit.setIdpaciente(paci);
            cit.setIdespecialidad(esp);
            cit.setIdlugar(lug);
            
            sesion.beginTransaction();
            sesion.save(cit);
            sesion.getTransaction().commit();
            sesion.close();
            admin(request, response);            
        
        }else{
          Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
          
          ArrayList datDoc = (ArrayList) sesion.createQuery("FROM Persona").list();
          ArrayList datPac = (ArrayList) sesion.createQuery("FROM Persona").list();
          ArrayList datEsp = (ArrayList) sesion.createQuery("FROM Especialidad").list();
          ArrayList datLugarAt = (ArrayList) sesion.createQuery("FROM LugarAtencion").list();
          ArrayList<Persona> doct = new ArrayList();
          ArrayList<Persona> pacien = new ArrayList();
          ArrayList<Especialidad> espe  = new ArrayList();
          ArrayList<LugarAtencion> lugAt = new ArrayList();
          
          for(Object obj: datDoc){
              doct.add((Persona)obj);
          }
          for(Object obj: datPac){
              pacien.add((Persona)obj);
          }
          for(Object obj: datEsp){
              espe.add((Especialidad)obj);
          }
          for(Object obj: datLugarAt){
              lugAt.add((LugarAtencion)obj);
          }
          
          request.setAttribute("listaDoctor", doct);
          request.setAttribute("listaPaciente", pacien);
          request.setAttribute("listaEspecialidad", espe);
          request.setAttribute("listaLugar", lugAt);
        }
        try{
            request.getRequestDispatcher("CrearCita.jsp").include(request, response);
        }catch(ServletException | IOException ex){
            System.out.println("Error registrar cita " + ex.getMessage());
        }
    }
private void Atendido(HttpServletRequest request, HttpServletResponse response) {
        Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();       
        int id = Integer.parseInt(request.getParameter("id"));       
        Cita cit = (Cita) sesion.get(Cita.class, id);
        String estado = "Atendido";          
        cit.setEstado(estado);            
        sesion.beginTransaction();
        sesion.saveOrUpdate(cit);
        sesion.getTransaction().commit();
        request.setAttribute("Cita", cit);
        ArrayList data = (ArrayList) sesion.createQuery("FROM Cita").list();
            
            ArrayList<Cita> ct= new ArrayList();
            for(Object obj: data){
                ct.add((Cita)obj);
            }
            request.setAttribute("ListaCita", ct);
        try{
             request.getRequestDispatcher("crearFormula.jsp").forward(request, response);
         }catch(ServletException | IOException ex){
             System.out.println("Error al actualizar cita " + ex.getMessage());
         }
        
   }
private void Cancelado(HttpServletRequest request, HttpServletResponse response) {
        Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();       
        int id = Integer.parseInt(request.getParameter("id"));       
        Cita cit = (Cita) sesion.get(Cita.class, id);
        String estado = "Cancelado";          
        cit.setEstado(estado);            
        sesion.beginTransaction();
        sesion.saveOrUpdate(cit);
        sesion.getTransaction().commit();
        request.setAttribute("Cita", cit);
        ArrayList data = (ArrayList) sesion.createQuery("FROM Cita").list();
            
            ArrayList<Cita> ct= new ArrayList();
            for(Object obj: data){
                ct.add((Cita)obj);
            }
            request.setAttribute("ListaCita", ct);
        try{
             request.getRequestDispatcher("Cita.do?a=MiAgendaPaciente").include(request, response);
         }catch(ServletException | IOException ex){
             System.out.println("Error al actualizar cita " + ex.getMessage());
         }
        
   }
private void Update(HttpServletRequest request, HttpServletResponse response) {
        Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();       
        int id = Integer.parseInt(request.getParameter("id"));       
        Session session = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
           Cita cit = (Cita) sesion.get(Cita.class, id);
            ArrayList datDoc = (ArrayList) sesion.createQuery("FROM Persona").list();
            ArrayList datPac = (ArrayList) sesion.createQuery("FROM Persona").list();
            ArrayList datEsp = (ArrayList) sesion.createQuery("FROM Especialidad").list();
            ArrayList datLugarAt = (ArrayList) sesion.createQuery("FROM LugarAtencion").list();
            ArrayList<Persona> doct = new ArrayList();
            ArrayList<Persona> pacien = new ArrayList();
            ArrayList<Especialidad> espe  = new ArrayList();
            ArrayList<LugarAtencion> lugAt = new ArrayList();
            
            for(Object obj: datDoc){
              doct.add((Persona)obj);
          }
          for(Object obj: datPac){
              pacien.add((Persona)obj);
          }
          for(Object obj: datEsp){
              espe.add((Especialidad)obj);
          }
          for(Object obj: datLugarAt){
              lugAt.add((LugarAtencion)obj);
          }
          request.setAttribute("editarCita", cit);
          request.setAttribute("listaDoctor", doct);
          request.setAttribute("paciente", pacien);
          request.setAttribute("especialidad", espe);
          request.setAttribute("lugar", lugAt);
        
        try{
            request.getRequestDispatcher("UpdateCita.jsp").include(request, response);
        }catch(ServletException | IOException ex){
            System.out.println("Error al actualizar cita " + ex.getMessage());
        }
        
   } 
    private void update(HttpServletRequest request, HttpServletResponse response) {
       Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
       
       int id = Integer.parseInt(request.getParameter("id"));
       
       Cita cit = (Cita) sesion.get(Cita.class, id);
       if(request.getMethod().equalsIgnoreCase("POST")){
            String hora = request.getParameter("txthora");
            String estado = request.getParameter("txtestado");
            String observaciones = request.getParameter("txtobservaciones");
            String doctor = request.getParameter("doctor");
            String paciente = request.getParameter("paciente");
            String especialidad = request.getParameter("especialidad");
            String lugar = request.getParameter("lugar");
           
           cit.setHora(hora);
           cit.setEstado(estado);
           cit.setObservaciones(observaciones);
           
           
            Date fecha;
            try{
                fecha = new SimpleDateFormat("yyyy-MM-dd").parse(request.getParameter("txtfecha"));
                cit.setFecha(fecha);
            }catch(ParseException pe){
                
            }
            
          
            
            
            Persona doc = (Persona) sesion.get(Persona.class, Integer.parseInt(doctor));
            Persona paci = (Persona) sesion.get(Persona.class, Integer.parseInt(paciente));
            Especialidad esp = (Especialidad) sesion.get(Especialidad.class, Integer.parseInt(especialidad));
            LugarAtencion lug = (LugarAtencion) sesion.get(LugarAtencion.class, Integer.parseInt(lugar));
            cit.setIddoctor(doc);
            cit.setIdpaciente(paci);
            cit.setIdespecialidad(esp);
            cit.setIdlugar(lug);
            
            sesion.beginTransaction();
            sesion.saveOrUpdate(cit);
            sesion.getTransaction().commit();
            admin(request, response);
       }else{
            Session session = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
           
            ArrayList datDoc = (ArrayList) sesion.createQuery("FROM Persona").list();
            ArrayList datPac = (ArrayList) sesion.createQuery("FROM Persona").list();
            ArrayList datEsp = (ArrayList) sesion.createQuery("FROM Especialidad").list();
            ArrayList datLugarAt = (ArrayList) sesion.createQuery("FROM LugarAtencion").list();
            ArrayList<Persona> doct = new ArrayList();
            ArrayList<Persona> pacien = new ArrayList();
            ArrayList<Especialidad> espe  = new ArrayList();
            ArrayList<LugarAtencion> lugAt = new ArrayList();
            
            for(Object obj: datDoc){
              doct.add((Persona)obj);
          }
          for(Object obj: datPac){
              pacien.add((Persona)obj);
          }
          for(Object obj: datEsp){
              espe.add((Especialidad)obj);
          }
          for(Object obj: datLugarAt){
              lugAt.add((LugarAtencion)obj);
          }
          request.setAttribute("editarCita", cit);
          request.setAttribute("listaDoctor", doct);
          request.setAttribute("paciente", pacien);
          request.setAttribute("especialidad", espe);
          request.setAttribute("lugar", lugAt);
          try{
            request.getRequestDispatcher("UpdateCita.jsp").forward(request, response);
            }catch(ServletException | IOException ex){
                System.out.println("Error al actualizar cita " + ex.getMessage());
            }
        }
       
        
   }      
            
    

    private void delete(HttpServletRequest request, HttpServletResponse response) {
       Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
        
        int id = Integer.parseInt(request.getParameter("id"));
        
        Cita cit = (Cita) sesion.get(Cita.class, id);
        
        sesion.beginTransaction();
        sesion.delete(cit);
        sesion.getTransaction().commit();
        admin(request, response);
    }
    private void misCitas(HttpServletRequest request, HttpServletResponse response) {
        Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
        ArrayList data = (ArrayList) sesion.createQuery("From Cita").list();
        ArrayList datDoc = (ArrayList) sesion.createQuery("FROM Persona").list();
          ArrayList datPac = (ArrayList) sesion.createQuery("FROM Persona").list();
          ArrayList datEsp = (ArrayList) sesion.createQuery("FROM Especialidad").list();
          ArrayList datLugarAt = (ArrayList) sesion.createQuery("FROM LugarAtencion").list();
          ArrayList<Persona> doct = new ArrayList();
          ArrayList<Persona> pacien = new ArrayList();
          ArrayList<Especialidad> espe  = new ArrayList();
          ArrayList<LugarAtencion> lugAt = new ArrayList();
          
          for(Object obj: datDoc){
              doct.add((Persona)obj);
          }
          for(Object obj: datPac){
              pacien.add((Persona)obj);
          }
          for(Object obj: datEsp){
              espe.add((Especialidad)obj);
          }
          for(Object obj: datLugarAt){
              lugAt.add((LugarAtencion)obj);
          }
          
          request.setAttribute("listaDoctor", doct);
          request.setAttribute("listaPaciente", pacien);
          request.setAttribute("listaEspecialidad", espe);
          request.setAttribute("listaLugar", lugAt);
        
        ArrayList<Cita> lista = new ArrayList();
        for(Object obj: data){
            lista.add((Cita)obj);
        }
        request.setAttribute("ListaCita", lista);
        try{
            request.getRequestDispatcher("MisCitas.jsp").forward(request, response);
        }catch(ServletException | IOException ex){
            System.out.println("Error al registrar cita " + ex.getMessage());
        }
    }
    private void MiAgendaPaciente(HttpServletRequest request, HttpServletResponse response) {
        Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
        ArrayList data = (ArrayList) sesion.createQuery("From Cita").list();
        ArrayList datDoc = (ArrayList) sesion.createQuery("FROM Persona").list();
          ArrayList datPac = (ArrayList) sesion.createQuery("FROM Persona").list();
          ArrayList datEsp = (ArrayList) sesion.createQuery("FROM Especialidad").list();
          ArrayList datLugarAt = (ArrayList) sesion.createQuery("FROM LugarAtencion").list();
          ArrayList<Persona> doct = new ArrayList();
          ArrayList<Persona> pacien = new ArrayList();
          ArrayList<Especialidad> espe  = new ArrayList();
          ArrayList<LugarAtencion> lugAt = new ArrayList();
          
          for(Object obj: datDoc){
              doct.add((Persona)obj);
          }
          for(Object obj: datPac){
              pacien.add((Persona)obj);
          }
          for(Object obj: datEsp){
              espe.add((Especialidad)obj);
          }
          for(Object obj: datLugarAt){
              lugAt.add((LugarAtencion)obj);
          }
          
          request.setAttribute("listaDoctor", doct);
          request.setAttribute("listaPaciente", pacien);
          request.setAttribute("listaEspecialidad", espe);
          request.setAttribute("listaLugar", lugAt);
        ArrayList<Cita> lista = new ArrayList();
        for(Object obj: data){
            lista.add((Cita)obj);
        }
        request.setAttribute("ListaCita", lista);
        try{
            request.getRequestDispatcher("MiAgendaCitasPacientes.jsp").forward(request, response);
        }catch(ServletException | IOException ex){
            System.out.println("Error al registrar cita " + ex.getMessage());
        }
    }
    private void admin(HttpServletRequest request, HttpServletResponse response) {
        Session sesion = HibernateUtil.HibernateUtil.getSessionFactory().openSession();
        ArrayList data = (ArrayList) sesion.createQuery("From Cita").list();
        
        ArrayList<Cita> lista = new ArrayList();
        for(Object obj: data){
            lista.add((Cita)obj);
        }
        request.setAttribute("ListaCita", lista);
        try{
            request.getRequestDispatcher("ListaCita.jsp").forward(request, response);
        }catch(ServletException | IOException ex){
            System.out.println("Error al registrar cita " + ex.getMessage());
        }
    }

}
