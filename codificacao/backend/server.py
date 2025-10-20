from typing import Optional
from fastapi import FastAPI, Body, Form, HTTPException, status , Path
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import RedirectResponse
from pydantic import BaseModel
from src.presentation.controllers.profissional_controller import ProfissionalController
from src.presentation.controllers.comentario_controller import ComentarioController
from src.presentation.schemas.comentario_request import ComentarioRequest
from src.presentation.schemas.comentario_response import ComentarioResponse
from src.presentation.controllers.barbearia_controller import BarbeariaController
from src.presentation.schemas.barberia_request import BarbeariaRequest
from src.presentation.schemas.barbearia_response import BarbeariaResponse
from src.presentation.controllers.barbearia_controller import BarbeariaController
app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], 
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class BarbeariaRequest(BaseModel):
    nome: str
    email: str
    endereco: str
    telefone: str
    foto_url: Optional[str] = None
    horario_abertura: str
    horario_fechamento: str
    descricao: str

@app.post('/profissional', status_code=status.HTTP_201_CREATED)
def cadastrar_profissional(nome: str = Body(...), horario_inicio: str = Body(...), horario_fim: str = Body(...)):
    controller = ProfissionalController()
    try:
        return controller.cadastrar_profissional(nome, horario_inicio, horario_fim)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.get('/profissional/{id}', status_code=status.HTTP_200_OK)
def buscar_profissional(id: str = Path(...)):
    controller = ProfissionalController()
    try:
        return controller.buscar_profissional(id)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.get('/profissionais', status_code=status.HTTP_200_OK)
def listar_profissional():
    controller = ProfissionalController()
    try:
        return controller.listar_profissionais()
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.put('/profissional/{id}', status_code=status.HTTP_200_OK)
def editar_horario(id: str = Path(...), horario_inicio: str = Body(...), horario_fim: str = Body(...)):
    controller = ProfissionalController()
    try:
        return controller.editar_horario(id, horario_inicio, horario_fim)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.delete('/profissional/{id_profissional}', status_code=status.HTTP_200_OK)
def deletar_profissional(id_profissional: str = Path(...)):
    controller = ProfissionalController()
    try:
        return controller.deletar_profissional(id_profissional)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/observacoes", status_code=status.HTTP_200_OK)
def listar_observacoes():
    controller = ComentarioController()
    try:
        return controller.listar_comentarios()
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/observacoes", status_code=status.HTTP_201_CREATED)
def criar_observacao(comentario: ComentarioRequest = Body(...)) -> ComentarioResponse:
    controller = ComentarioController()
    try:
        return controller.criar_comentario(comentario)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/observacoes/", status_code=status.HTTP_200_OK)
def atualizar_observacao(comentario = Body(...)):
    controller = ComentarioController()
    try:
        return {controller.atualizar_comentario(comentario)}
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.delete("/observacoes/{id_comentario}", status_code=status.HTTP_204_NO_CONTENT)
def deletar_observacao(id_comentario: str):
    controller = ComentarioController()
    try:
        controller.deletar_comentario(id_comentario)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.post("/criar_barbearia", status_code=status.HTTP_201_CREATED)
def criar_barbearia(
    nome: str = Form(...),
    email: str = Form(...),
    endereco: str = Form(...),
    telefone: str = Form(...),
    foto_url: Optional[str] = Form(None),
    horario_abertura: str = Form(...),
    horario_fechamento: str = Form(...),
    descricao: str = Form(...),
    ):

    barbearia = BarbeariaRequest(
        nome=nome,
        email=email,
        endereco=endereco,
        telefone=telefone,
        foto_url=foto_url,
        horario_abertura=horario_abertura,
        horario_fechamento=horario_fechamento,
        descricao=descricao
    )
    controller = BarbeariaController()
    try:
        controller.cadastrar_barbearia(barbearia)
        return RedirectResponse(url="http://localhost:5173/frontend/index.html", status_code=status.HTTP_303_SEE_OTHER)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
