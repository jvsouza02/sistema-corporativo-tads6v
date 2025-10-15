from fastapi import FastAPI, Body, HTTPException, status , Path
from fastapi.middleware.cors import CORSMiddleware
from src.presentation.controllers.profissional_controller import ProfissionalController
from src.presentation.controllers.comentario_controller import ComentarioController
from src.presentation.schemas.comentario_request import ComentarioRequest
from src.presentation.schemas.comentario_response import ComentarioResponse

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],        
    allow_credentials=False,     
    allow_methods=["*"],        
    allow_headers=["*"],        
)

@app.post('/profissional', status_code=status.HTTP_201_CREATED)
def cadastrar_profissional(nome: str = Body(...), horario_inicio: str = Body(...), horario_fim: str = Body(...)):
    controller = ProfissionalController()
    try:
        return controller.cadastrar_profissional(nome, horario_inicio, horario_fim)
    except ValueError as ve:
        raise HTTPException(status_code=400, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.get('/profissional', status_code=status.HTTP_200_OK)
def listar_profissional():
    controller = ProfissionalController()
    try:
        return controller.listar_profissionais()
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.put('/profissional/{id_profissional}', status_code=status.HTTP_200_OK)
def editar_horario(id_profissional: str = Path(...), horario_inicio: str = Body(...), horario_fim: str = Body(...)):
    controller = ProfissionalController()
    try:
        return controller.editar_horario(id_profissional, horario_inicio, horario_fim)
    except ValueError as ve:
        raise HTTPException(status_code=404, detail=str(ve))
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
@app.delete('/profissional/{id_profissional}', status_code=status.HTTP_204_NO_CONTENT)
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